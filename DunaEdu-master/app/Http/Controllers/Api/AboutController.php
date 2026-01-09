<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Benefice;
use App\Models\Instructeur;
use App\Models\Propo;
use App\Traits\HandlesLocalization;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    use HandlesLocalization;

    public function show(Request $request)
    {
        $lang = $this->getLang($request);

        $propo = Propo::first();
        if (!$propo) {
            return $this->error('Propo not configured', 500);
        }

        $benefices = Benefice::orderBy('order')->get();
        $instructeurs = Instructeur::where('is_active', true)->get();

        $data = [
            'subtitle' => $this->tr($propo, 'subtitle', $lang),
            'title'    => $this->tr($propo, 'title', $lang),
            'description' => $this->tr($propo, 'description', $lang),
            'stats'    => [
                'years_experience'   => $propo->{'years_experience_'.$lang} ?? $propo->years_experience_fr,
                'expert_instructors' => $propo->{'expert_instructors_'.$lang} ?? $propo->expert_instructors_fr,
                'students_worldwide' => $propo->{'students_worldwide_'.$lang} ?? $propo->students_worldwide_fr,
            ],
            'mission' => $this->tr($propo, 'mission', $lang),
            'vision'  => $this->tr($propo, 'vision', $lang),
            'value'   => $this->tr($propo, 'value', $lang),
            'images'  => [
                'main' => $propo->image ? asset('storage/'.$propo->image) : null,
                'image_1' => $propo->image_1 ? asset('storage/'.$propo->image_1) : null,
                'image_2' => $propo->image_2 ? asset('storage/'.$propo->image_2) : null,
                'image_3' => $propo->image_3 ? asset('storage/'.$propo->image_3) : null,
            ],
            'benefices' => $benefices->map(function ($b) use ($lang) {
                return [
                    'id'   => $b->id,
                    'text' => $this->tr($b, 'text', $lang),
                    'order' => $b->order,
                ];
            }),
            'instructors' => $instructeurs->map(function ($i) use ($lang) {
                return [
                    'id'         => $i->id,
                    'first_name' => $this->tr($i, 'first_name', $lang),
                    'last_name'  => $this->tr($i, 'last_name', $lang),
                    'specialty'  => $this->tr($i, 'specialty', $lang),
                    'bio'        => $this->tr($i, 'bio', $lang),
                    'avatar' => $i->avatar ? asset('storage/'.$i->avatar) : null,
                    'experience_years' => $i->experience_years,
                ];
            }),
        ];

        return $this->success($data);
    }
}
