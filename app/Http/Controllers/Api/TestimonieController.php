<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Testimonie;
use App\Traits\HandlesLocalization;
use Illuminate\Http\Request;

class TestimonieController extends Controller
{
    use HandlesLocalization;

    public function index(Request $request)
    {
        $lang = $this->getLang($request);

        $items = Testimonie::where('is_featured', true)
            ->orderByDesc('id')
            ->get()
            ->map(function (Testimonie $t) use ($lang) {
                $roleField = 'auteur_role_' . $lang;
                $contentField = 'content_' . $lang;

                return [
                    'id'       => $t->id,
                    'name'     => $t->auteur_name,
                    'role'     => $t->{$roleField} ?? $t->auteur_role_fr,
                    'photo_url'=> $t->photo_url ? asset('storage/' . $t->photo_url) : null,
                    'content'  => $t->{$contentField} ?? $t->content_fr,
                    'rating'   => $t->rating,
                ];
            });

        return $this->success($items->values());
    }
}
