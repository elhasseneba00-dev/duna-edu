<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Categorie;
use App\Models\Instructeur;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CoursController extends Controller
{
    private function autoFillLang(array &$data)
    {
        $fields = [
            'title', 'slug',
            'summary', 'description', 'duration_minutes', 'level'
        ];

        foreach ($fields as $field) {

            // Si EN est vide → mettre FR
            if (empty($data[$field . '_en'])) {
                $data[$field . '_en'] = $data[$field . '_fr'] ?? null;
            }

            // Si AR est vide → mettre FR
            if (empty($data[$field . '_ar'])) {
                $data[$field . '_ar'] = $data[$field . '_fr'] ?? null;
            }
        }
    }
    public function index()
    {
        $cours = Course::with('category', 'tags', 'instructeur')->orderBy('order')->get();
        return view('admin.cours.index', compact('cours'));
    }

    public function create()
    {
        return view('admin.cours.create', [
            'categories' => Categorie::all(),
            'tags' => Tag::all(),
            'instructeurs' => Instructeur::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_fr' => 'required|string|max:255',
            'price' => 'numeric|min:0',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'tags' => 'array|nullable',
        ]);


        $data = $request->except(['thumbnail', 'tags']);
        // Auto-fill EN + AR
        $this->autoFillLang($data);
        // Upload image
        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('courses', 'public');
        }
        $data['slug_fr'] = Str::slug($request->title_fr);
        $data['slug_en'] = Str::slug($data['title_en']);
        $data['slug_ar'] = Str::slug($data['title_ar']);
        $course = Course::create($data);

        // Attach tags
        if ($request->filled('tags')) {
            $course->tags()->sync($request->tags);
        }

        return redirect()->route('cours.index')->with('success', 'Informations enregistrées avec succès.');
    }

    public function show(Course $cour)
    {
        $cour->load('category', 'tags');
        return view('admin.cours.show', compact('cour'));
    }

    public function edit(Course $cour)
    {
        return view('admin.cours.edit', [
            'cour' => $cour,
            'categories' => Categorie::all(),
            'tags' => Tag::all(),
            'instructeurs' => Instructeur::all()
        ]);
    }

    public function update(Request $request, Course $cour)
    {
        $data = $request->validate([
            'title_fr' => 'required|string|max:255',
            'price' => 'numeric|min:0',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'tags' => 'array|nullable',
        ]);


        $data = $request->except(['thumbnail', 'tags']);

        // Auto-fill EN + AR
        $this->autoFillLang($data);
        // Upload image
        if ($request->hasFile('thumbnail')) {

            // supprimer ancienne image
            if ($cour->thumbnail && Storage::disk('public')->exists($cour->thumbnail)) {
                Storage::disk('public')->delete($cour->thumbnail);
            }

            // stocker la nouvelle
           $data['thumbnail'] = $request->file('thumbnail')->store('courses', 'public');
        }
        $data['slug_fr'] = Str::slug($request->title_fr);
        $data['slug_en'] = Str::slug($data['title_en']);
        $data['slug_ar'] = Str::slug($data['title_ar']);
        $cour->update($data);

        // sync tags
        $cour->tags()->sync($request->tags ?? []);

        return redirect()->route('cours.index')->with('success', 'Informations mises à jour avec succès.');
    }

    public function destroy(Course $cour)
    {
         if ($cour->thumbnail && Storage::disk('public')->exists($cour->thumbnail)) {
            Storage::disk('public')->delete($cour->thumbnail);
        }
        $cour->delete();
        return redirect()->route('cours.index')->with('success', 'Informations supprimées avec succès.');
    }
}
