<?php

namespace App\Http\Controllers;

use App\Models\Telephone;
use Illuminate\Http\Request;

class TelephoneController extends Controller
{
    /**
     * Affiche la liste de tous les téléphones.
     */
    public function index()
    {
        $telephones = Telephone::all();
        return view('admin.telephones.index', compact('telephones'));
    }

    /**
     * Affiche le formulaire de création d'un nouveau téléphone.
     */
    // public function create()
    // {
    //     return view('telephones.create');
    // }

    /**
     * Stocke un nouveau téléphone en base de données.
     */
    public function store(Request $request)
    {
        $request->validate([
            'numero_tel' => 'required|string|max:20',
            'type' => 'nullable|string|max:50',
        ]);

        Telephone::create([
            'numero_tel' => $request->numero_tel,
            'type' => $request->type,
        ]);

        return redirect()->route('telephones.index')
            ->with('success', 'Informations enregistrées avec succès.');
    }

    /**
     * Affiche le formulaire d'édition d'un téléphone existant.
     */
    public function edit(Telephone $telephone)
    {
        return view('admin.telephones.edit', compact('telephone'));
    }

    /**
     * Met à jour un téléphone existant.
     */
    public function update(Request $request, Telephone $telephone)
    {
        $request->validate([
            'numero_tel' => 'required|string|max:20',
            'type' => 'nullable|string|max:50',
        ]);

        $telephone->update([
            'numero_tel' => $request->numero_tel,
            'type' => $request->type,
        ]);

        return redirect()->route('telephones.index')
            ->with('success', 'Informations mises à jour avec succès.');
    }

    /**
     * Supprime un téléphone.
     */
    public function destroy(Telephone $telephone)
    {
        $telephone->delete();
        return redirect()->route('telephones.index')
            ->with('success', 'Informations supprimées avec succès.');
    }

    /**
     * Affiche les détails d'un téléphone.
     */
    public function show(Telephone $telephone)
    {
        return view('admin.telephones.show', compact('telephone'));
    }
}
