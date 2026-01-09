<?php

namespace App\Http\Controllers;

use App\Models\Societe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SocieteController extends Controller
{
    /**
     * Remplir EN et AR avec les valeurs FR si vides
     */
    private function autoFillLang(array &$data)
    {
        $fields = [
            'name', 'slogan',
            'street_address', 'postal_code', 'city', 'country'
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

    /**
     * STORE
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name_fr' => 'required|string|max:255',
    //         'slogan_fr' => 'required|string|max:255',
    //         'logo_path' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
    //         'cover_image_path' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:4096',
    //     ]);

    //     $data = $request->except(['logo_path', 'cover_image_path']);

    //     // Auto-fill EN + AR
    //     $this->autoFillLang($data);

    //     if ($request->hasFile('logo_path')) {
    //         $data['logo_path'] = $request->file('logo_path')->store('societes/logos', 'public');
    //     }

    //     if ($request->hasFile('cover_image_path')) {
    //         $data['cover_image_path'] = $request->file('cover_image_path')->store('societes/covers', 'public');
    //     }

    //     Societe::create($data);

    //     return redirect()->back()->with('success', 'Société enregistrée avec succès.');
    // }
    public function edit()
    {   $societe = Societe::first();
        return view('admin.societe.edit', compact('societe'));
    }
    /**
     * UPDATE
     */
    public function update(Request $request, Societe $societe)
    {
        $request->validate([
            'name_fr' => 'required|string|max:255',
            'slogan_fr' => 'required|string|max:255',
            'logo_path' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
            'cover_image_path' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:4096',
        ]);

        $data = $request->except(['logo_path', 'cover_image_path']);

        // Auto-fill EN + AR
        $this->autoFillLang($data);

        if ($request->hasFile('logo_path')) {

            if ($societe->logo_path && Storage::disk('public')->exists($societe->logo_path)) {
                Storage::disk('public')->delete($societe->logo_path);
            }

            $data['logo_path'] = $request->file('logo_path')->store('societes/logos', 'public');
        }

        if ($request->hasFile('cover_image_path')) {

            if ($societe->cover_image_path && Storage::disk('public')->exists($societe->cover_image_path)) {
                Storage::disk('public')->delete($societe->cover_image_path);
            }

            $data['cover_image_path'] = $request->file('cover_image_path')->store('societes/covers', 'public');
        }

        $societe->update($data);

        return redirect()->back()->with('success', 'Informations mises à jour avec succès.');
    }
}
