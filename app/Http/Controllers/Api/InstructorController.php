<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Instructeur;
use App\Traits\HandlesLocalization;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    use HandlesLocalization;

    public function index(Request $request)
    {
        $lang = $this->getLang($request);

        $instructors = Instructeur::where('is_active', true)->get()->map(function ($i) use ($lang) {
            return [
                'id'         => $i->id,
                'first_name' => $this->tr($i, 'first_name', $lang),
                'last_name'  => $this->tr($i, 'last_name', $lang),
                'specialty'  => $this->tr($i, 'specialty', $lang),
                'bio'        => $this->tr($i, 'bio', $lang),
                'avatar_url' => $i->avatar ? asset('storage/'.$i->avatar) : null,
                'experience_years' => $i->experience_years,
                'socials' => [
                    'facebook' => $i->facebook,
                    'instagram' => $i->instagram,
                    'linkedin' => $i->linkedin,
                    'youtube' => $i->youtube,
                ],
            ];
        });

        return $this->success($instructors);
    }

    public function show(int $id, Request $request)
    {
        $lang = $this->getLang($request);

        $i = Instructeur::findOrFail($id);

        $data = [
            'id'         => $i->id,
            'first_name' => $this->tr($i, 'first_name', $lang),
            'last_name'  => $this->tr($i, 'last_name', $lang),
            'specialty'  => $this->tr($i, 'specialty', $lang),
            'bio'        => $this->tr($i, 'bio', $lang),
            'avatar_url' => $i->avatar ? asset('storage/'.$i->avatar) : null,
            'experience_years' => $i->experience_years,
            'socials' => [
                'facebook' => $i->facebook,
                'instagram' => $i->instagram,
                'linkedin' => $i->linkedin,
                'youtube' => $i->youtube,
            ],
        ];

        return $this->success($data);
    }
}
