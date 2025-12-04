<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propo;
use Illuminate\Support\Facades\Storage;

class PropoController extends Controller
{
    private function autoFillLang(array &$data)
    {
        $fields = [
            'subtitle', 'title',
            'description', 'years_experience', 'expert_instructors', 'students_worldwide', 'mission', 'vision', 'value'
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
     * Liste (si besoin).
     */
    // public function index()
    // {
    //     $propos = Propo::first(); // il y en a normalement un seul
    //     return view('admin.propos.index', compact('propos'));
    // }

    /**
     * Formulaire création.
     */
    // public function create()
    // {
    //     return view('admin.propos.create');
    // }

    /**
     * Enregistrement avec upload image.
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'subtitle_fr' => 'required|string|max:255',
    //         'title_fr'    => 'required|string|max:255',
    //         'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    //     ]);

    //     $data = $request->except(['image']);
    //     // Auto-fill EN + AR
    //     $this->autoFillLang($data);

    //     // Upload image si envoyée
    //     if ($request->hasFile('image')) {
    //         $data['image'] = $request->file('image')->store('propos', 'public');
    //     }

    //     Propo::create($data);

    //     return redirect()->back()->with('success', 'À propos ajouté avec succès');
    // }

    /**
     * Formulaire édition.
     */
    public function edit()
    {
        $propo = Propo::first();
        return view('admin.propos.edit', compact('propo'));
    }

    /**
     * Mise à jour avec remplacement de l’image.
     */
    public function update(Request $request, $id)
    {
        $propos = Propo::findOrFail($id);

        $request->validate([
            'subtitle_fr' => 'required|string|max:255',
            'title_fr'    => 'required|string|max:255',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'image_1' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_2' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_3' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);

        $data = $request->except(['image', 'image_1', 'image_2', 'image_3']);
        // Auto-fill EN + AR
        $this->autoFillLang($data);

        // Upload nouvelle image
        if ($request->hasFile('image')) {

            // supprimer ancienne image
            if ($propos->image && Storage::disk('public')->exists($propos->image)) {
                Storage::disk('public')->delete($propos->image);
            }

            // stocker la nouvelle
            $data['image'] = $request->file('image')->store('propos', 'public');
        }

        // Image 1
        if ($request->hasFile('image_1')) {
            if ($propos->image_1 && Storage::disk('public')->exists($propos->image_1)) {
                Storage::disk('public')->delete($propos->image_1);
            }
            $data['image_1'] = $request->file('image_1')->store('propos', 'public');
        }

        // Image 2
        if ($request->hasFile('image_2')) {
            if ($propos->image_2 && Storage::disk('public')->exists($propos->image_2)) {
                Storage::disk('public')->delete($propos->image_2);
            }
            $data['image_2'] = $request->file('image_2')->store('propos', 'public');
        }

        // Image 3
        if ($request->hasFile('image_3')) {
            if ($propos->image_3 && Storage::disk('public')->exists($propos->image_3)) {
                Storage::disk('public')->delete($propos->image_3);
            }
            $data['image_3'] = $request->file('image_3')->store('propos', 'public');
        }

        $propos->update($data);

        return redirect()->back()->with('success', 'Informations mises à jour avec succès.');
    }

    /**
     * Suppression + image
     */
    public function destroy($id)
    {
        $propos = Propo::findOrFail($id);

        // supprimer image dans storage
        if ($propos->image && Storage::disk('public')->exists($propos->image)) {
            Storage::disk('public')->delete($propos->image);
        }

        if ($propos->image_1 && Storage::disk('public')->exists($propos->image_1)) {
            Storage::disk('public')->delete($propos->image_1);
        }

        if ($propos->image_2 && Storage::disk('public')->exists($propos->image_2)) {
            Storage::disk('public')->delete($propos->image_2);
        }

        if ($propos->image_3 && Storage::disk('public')->exists($propos->image_3)) {
            Storage::disk('public')->delete($propos->image_3);
        }

        $propos->delete();

        return redirect()->back()->with('success', 'Entrée supprimée avec succès');
    }

    public function show($id)
    {
        $propo = Propo::findOrFail($id);
        return view('admin.propos.show', compact('propo'));
    }
}
