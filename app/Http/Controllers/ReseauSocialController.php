<?php

namespace App\Http\Controllers;

use App\Models\ReseauSocial;
use Illuminate\Http\Request;

class ReseauSocialController extends Controller
{
    public function index()
    {
        $reseaux = ReseauSocial::all();
        return view('admin.reseaux_sociaux.index', compact('reseaux'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'url' => 'required|url|max:255',
            'icone' => 'nullable|string|max:100',
        ]);

        ReseauSocial::create($request->only('nom','url','icone'));

        return redirect()->route('reseaux_sociaux.index')->with('success', 'Informations enregistrées avec succès.');
    }

    public function edit($id)
    {
        $reseauSocial = ReseauSocial::findOrFail($id);
        return view('admin.reseaux_sociaux.edit', compact('reseauSocial'));
    }

    public function update(Request $request, $id)
    {
        $reseauSocial = ReseauSocial::findOrFail($id);
        $request->validate([
            'nom' => 'required|string|max:100',
            'url' => 'required|url|max:255',
            'icone' => 'nullable|string|max:100',
        ]);

        $reseauSocial->update($request->only('nom','url','icone'));

        return redirect()->route('reseaux_sociaux.index')->with('success', 'Informations mises à jour avec succès.');
    }

    public function destroy($id)
    {
        $reseauSocial = ReseauSocial::findOrFail($id);
        $reseauSocial->delete();
        return redirect()->route('reseaux_sociaux.index')->with('success', 'Informations supprimées avec succès.');
    }

    public function show($id)
    {
        $reseauSocial = ReseauSocial::findOrFail($id);
        return view('admin.reseaux_sociaux.show', compact('reseauSocial'));
    }
}
