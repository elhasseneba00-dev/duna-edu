<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Carriere;
use App\Traits\HandlesLocalization;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CarriereController extends Controller
{
    use HandlesLocalization;

    public function index(Request $request)
    {
        $lang = $this->getLang($request);

        $carrieres = Carriere::where('is_active', true)
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->get();

        $data = $carrieres->map(function (Carriere $c) use ($lang) {
            $titleField = 'titre_' . $lang;
            $departmentField = 'department_' . $lang;
            $locationField = 'location_' . $lang;
            $descriptionField = 'description_' . $lang;

            return [
                'id'         => $c->id,
                'slug'       => $c->{'slug_' . $lang} ?? $c->slug_fr,
                'title'      => $c->{$titleField} ?? $c->titre_fr,
                'department' => $c->{$departmentField} ?? $c->department_fr,
                'location'   => $c->{$locationField} ?? $c->location_fr,
                'type'       => $c->type,
                'excerpt'    => Str::limit(strip_tags($c->{$descriptionField} ?? $c->description_fr), 180),
                'published_at' => $c->published_at,
            ];
        });

        return $this->success($data->values());
    }

    public function show(string $slug, Request $request)
    {
        $lang = $this->getLang($request);
        $slugField = 'slug_' . $lang;
        $titleField = 'titre_' . $lang;
        $departmentField = 'department_' . $lang;
        $locationField = 'location_' . $lang;
        $descriptionField = 'description_' . $lang;

        $carriere = Carriere::where($slugField, $slug)
            ->where('is_active', true)
            ->first();

        if (! $carriere) {
            return $this->error('Career not found', 404);
        }

        $data = [
            'id'          => $carriere->id,
            'slug'        => $carriere->{$slugField} ?? $carriere->slug_fr,
            'title'       => $carriere->{$titleField} ?? $carriere->titre_fr,
            'department'  => $carriere->{$departmentField} ?? $carriere->department_fr,
            'location'    => $carriere->{$locationField} ?? $carriere->location_fr,
            'type'        => $carriere->type,
            'description' => $carriere->{$descriptionField} ?? $carriere->description_fr,
            'published_at'=> $carriere->published_at,
        ];

        return $this->success($data);
    }
}
