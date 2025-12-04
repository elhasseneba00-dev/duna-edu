<?php

namespace App\Http\Controllers;

use App\Models\Instructeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InstructeurController extends Controller
{
    private function autoFillLang(array &$data)
    {
        $fields = [
            'first_name',
            'last_name',
            'bio',
            'specialty'
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
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructeurs = Instructeur::all();
        return view('admin.instructeurs.index', compact('instructeurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.instructeurs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // Noms
            'first_name_fr' => 'required|string|max:255',
            'first_name_en' => 'nullable|string|max:255',
            'first_name_ar' => 'nullable|string|max:255',
            'last_name_fr' => 'required|string|max:255',
            'last_name_en' => 'nullable|string|max:255',
            'last_name_ar' => 'nullable|string|max:255',

            // Contact
            'email' => 'required|email|unique:instructeurs,email',
            'phone' => 'nullable|string|max:50',

            // Bio
            'bio_fr' => 'nullable|string',
            'bio_en' => 'nullable|string',
            'bio_ar' => 'nullable|string',

            // Uploads
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'cv' => 'nullable|mimes:pdf,doc,docx|max:4096',

            // Adresse
            'address_line1' => 'nullable|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',

            // Spécialité
            'specialty_fr' => 'nullable|string|max:255',
            'specialty_en' => 'nullable|string|max:255',
            'specialty_ar' => 'nullable|string|max:255',

            // Expérience
            'experience_years' => 'nullable|integer|min:0|max:80',

            // Réseaux sociaux
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',

            'is_active' => 'nullable|boolean',
        ]);
        $data = $request->except(['avatar', 'cv']);
        // Auto-fill EN + AR
        $this->autoFillLang($data);
        // Upload avatar
        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('instructeurs/avatar', 'public');
        }

        // Upload cv
        if ($request->hasFile('cv')) {
            $data['cv'] = $request->file('cv')->store('instructeurs/cv', 'public');
        }

        Instructeur::create($data);

        return redirect()->route('instructeurs.index')->with('success', 'Instructeur ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Instructeur $instructeur)
    {
        return view('admin.instructeurs.show', compact('instructeur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instructeur $instructeur)
    {
        return view('admin.instructeurs.edit', compact('instructeur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instructeur $instructeur)
    {
        $request->validate([
            'first_name_fr' => 'required|string|max:255',
            'first_name_en' => 'nullable|string|max:255',
            'first_name_ar' => 'nullable|string|max:255',
            'last_name_fr' => 'required|string|max:255',
            'last_name_en' => 'nullable|string|max:255',
            'last_name_ar' => 'nullable|string|max:255',

            'email' => 'required|email|unique:instructeurs,email,' . $instructeur->id,
            'phone' => 'nullable|string|max:50',

            'bio_fr' => 'nullable|string',
            'bio_en' => 'nullable|string',
            'bio_ar' => 'nullable|string',

            // Uploads
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'cv' => 'nullable|mimes:pdf,doc,docx|max:4096',

            'address_line1' => 'nullable|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',

            'specialty_fr' => 'nullable|string|max:255',
            'specialty_en' => 'nullable|string|max:255',
            'specialty_ar' => 'nullable|string|max:255',

            'experience_years' => 'nullable|integer|min:0|max:80',

            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',

            'is_active' => 'nullable|boolean',
        ]);
        $data = $request->except(['avatar', 'cv']);
        // Auto-fill EN + AR
        $this->autoFillLang($data);
        // Upload avatar (delete old)
        if ($request->hasFile('avatar')) {

            if ($instructeur->avatar && Storage::disk('public')->exists($instructeur->avatar)) {
                Storage::disk('public')->delete($instructeur->avatar);
            }

            $data['avatar'] = $request->file('avatar')->store('instructeurs/avatar', 'public');
        }

        // Upload cv (delete old)
        if ($request->hasFile('cv')) {

            if ($instructeur->cv && Storage::disk('public')->exists($instructeur->cv)) {
                Storage::disk('public')->delete($instructeur->cv);
            }

            $data['cv'] = $request->file('cv')->store('instructeurs/cv', 'public');
        }

        $instructeur->update($data);

        return redirect()->route('instructeurs.index')->with('success', 'Instructeur mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instructeur $instructeur)
    {
        // Delete avatar
        if ($instructeur->avatar && Storage::disk('public')->exists($instructeur->avatar)) {
            Storage::disk('public')->delete($instructeur->avatar);
        }

        // Delete CV
        if ($instructeur->cv && Storage::disk('public')->exists($instructeur->cv)) {
            Storage::disk('public')->delete($instructeur->cv);
        }

        $instructeur->delete();

        return redirect()->route('instructeurs.index')->with('success', 'Instructeur supprimé avec succès.');
    }
}
