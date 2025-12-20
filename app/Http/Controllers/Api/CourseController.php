<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Course;
use App\Traits\HandlesLocalization;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    use HandlesLocalization;

    public function categories(Request $request)
    {
        $lang = $this->getLang($request);

        $categories = Categorie::all()->map(function ($c) use ($lang) {
            return [
                'id'   => $c->id,
                'name' => $this->tr($c, 'name', $lang),
                'icon' => $c->icon,
            ];
        });

        return $this->success($categories);
    }

    public function tags(Request $request)
    {
        $lang = $this->getLang($request);

        $tags = Tag::all()->map(function ($t) use ($lang) {
            return [
                'id'   => $t->id,
                'name' => $this->tr($t, 'name', $lang),
                'slug' => $this->tr($t, 'slug', $lang),
            ];
        });

        return $this->success($tags);
    }

    public function index(Request $request)
    {
        $lang = $this->getLang($request);

        $query = Course::with(['category', 'instructeur', 'tags'])
            ->where('is_published', true);

        // Filtres
        if ($categoryId = $request->query('category_id')) {
            $query->where('category_id', $categoryId);
        }

        if ($tagSlug = $request->query('tag_slug')) {
            $slugField = 'slug_'.$lang;
            $query->whereHas('tags', function ($q) use ($slugField, $tagSlug) {
                $q->where($slugField, $tagSlug);
            });
        }

        if ($priceType = $request->query('price_type')) {
            $field = 'price_type_'.$lang;
            $query->where($field, $priceType);
        }

        if ($level = $request->query('level')) {
            $field = 'level_'.$lang;
            $query->where($field, $level);
        }

        if ($search = $request->query('search')) {
            $titleField = 'title_'.$lang;
            $query->where($titleField, 'like', "%{$search}%");
        }

        $courses = $query->orderBy('order')->get();

        $data = $courses->map(function ($course) use ($lang) {
            return $this->transformCourse($course, $lang, false);
        });

        return $this->success($data);
    }

    public function show(string $slug, Request $request)
    {
        $lang = $this->getLang($request);
        $slugField = 'slug_'.$lang;

        $course = Course::with([
            'category',
            'instructeur',
            'tags',
            'modules.lessons',
        ])
            ->where($slugField, $slug)
            ->where('is_published', true)
            ->first();

        if (!$course) {
            return $this->error('Course not found', 404);
        }

        $data = $this->transformCourse($course, $lang, true);

        return $this->success($data);
    }

    private function transformCourse(Course $course, string $lang, bool $withModules = false): array
    {
        $title   = $this->tr($course, 'title', $lang);
        $summary = $this->tr($course, 'summary', $lang);
        $desc    = $this->tr($course, 'description', $lang);
        $level   = $course->{'level_'.$lang} ?? $course->level_fr;
        $durationMinutes = $course->{'duration_minutes_'.$lang} ?? $course->duration_minutes_fr;
        $priceType       = $course->{'price_type_'.$lang} ?? $course->price_type_fr;

        $data = [
            'id'          => $course->id,
            'slug'        => $course->{'slug_'.$lang} ?? $course->slug_fr,
            'title'       => $title,
            'summary'     => $summary,
            'description' => $desc,
            'price'       => $course->price,
            'price_type'  => $priceType,
            'duration_minutes' => $durationMinutes,
            'level'       => $level,
            'language'    => $course->language,
            'thumbnail_url' => $course->thumbnail ? asset('storage/'.$course->thumbnail) : null,
            'category' => $course->category ? [
                'id'   => $course->category->id,
                'name' => $this->tr($course->category, 'name', $lang),
                'icon' => $course->category->icon,
            ] : null,
            'instructor' => $course->instructeur ? [
                'id'   => $course->instructeur->id,
                'first_name' => $this->tr($course->instructeur, 'first_name', $lang),
                'last_name'  => $this->tr($course->instructeur, 'last_name', $lang),
                'avatar_url' => $course->instructeur->avatar ? asset('storage/'.$course->instructeur->avatar) : null,
            ] : null,
            'tags' => $course->tags->map(function ($t) use ($lang) {
                return [
                    'id'   => $t->id,
                    'name' => $this->tr($t, 'name', $lang),
                    'slug' => $this->tr($t, 'slug', $lang),
                ];
            }),
        ];

        if ($withModules) {
            $data['modules'] = $course->modules->sortBy('order')->map(function ($m) use ($lang) {
                return [
                    'id'          => $m->id,
                    'title'       => $this->tr($m, 'title', $lang),
                    'description' => $this->tr($m, 'description', $lang),
                    'order'       => $m->order,
                    'lessons'     => $m->lessons->sortBy('order')->map(function ($lesson) use ($lang) {
                        return [
                            'id'      => $lesson->id,
                            'title'   => $this->tr($lesson, 'title', $lang),
                            'content' => $this->tr($lesson, 'content', $lang),
                            'type'    => $lesson->content_type,
                            'video_url'  => $lesson->video_url,
                            'attachment_url' => $lesson->attachment ? asset('storage/'.$lesson->attachment) : null,
                            'duration_seconds' => $lesson->duration_seconds,
                            'is_locked'        => $lesson->is_locked,
                            'order'            => $lesson->order,
                        ];
                    })->values(),
                ];
            })->values();
        }

        return $data;
    }
}
