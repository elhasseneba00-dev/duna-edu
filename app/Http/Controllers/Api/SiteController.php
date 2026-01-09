<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Email;
use App\Models\LienUtile;
use App\Models\ReseauSocial;
use App\Models\Societe;
use App\Models\Telephone;
use App\Traits\HandlesLocalization;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    use HandlesLocalization;

    public function show(Request $request)
    {
        $lang = $this->getLang($request);

        $societe = Societe::first();
        if (!$societe) {
            return $this->error('Societe not configured', 500);
        }

        $data = [
            'company' => [
                'name'   => $this->tr($societe, 'name', $lang),
                'slogan' => $this->tr($societe, 'slogan', $lang),
                'email'  => $societe->email,
                'email_alt' => $societe->email_alt,
                'phone'  => $societe->phone,
                'phone_alt' => $societe->phone_alt,
                'website' => $societe->website,
                'address' => [
                    'street' => $this->tr($societe, 'street_address', $lang),
                    'postal_code' => $this->tr($societe, 'postal_code', $lang),
                    'city'  => $this->tr($societe, 'city', $lang),
                    'country' => $this->tr($societe, 'country', $lang),
                ],
                'logo_url'  => $societe->logo_path ? asset('storage/'.$societe->logo_path) : null,
                'cover_url' => $societe->cover_image_path ? asset('storage/'.$societe->cover_image_path) : null,
            ],
            'phones' => Telephone::all()->map(function ($tel) {
                return [
                    'number' => $tel->numero_tel,
                    'type'   => $tel->type,
                ];
            }),
            'emails' => Email::all()->map(function ($email) {
                return [
                    'email' => $email->email,
                    'type'  => $email->type,
                ];
            }),
            'links' => LienUtile::all()->map(function ($lien) {
                return [
                    'title' => $lien->titre,
                    'url'   => $lien->url,
                    'type'  => $lien->type,
                ];
            }),
            'socials' => ReseauSocial::all()->map(function ($r) {
                return [
                    'name'  => $r->nom,
                    'url'   => $r->url,
                    'icon'  => $r->icone,
                ];
            }),
        ];

        return $this->success($data);
    }
}
