<?php

namespace App\Http\Controllers;

use App\Models\LienUtile;
use Illuminate\Http\Request;

class LienUtileController extends Controller
{
    public function index()
    {
        $liens = LienUtile::all();
        return view('admin.liens_utiles.index', compact('liens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'type' => 'nullable|string|max:50',
        ]);

        LienUtile::create($request->only('titre', 'url', 'type'));

        return redirect()->route('liens_utiles.index')->with('success', 'Informations enregistrées avec succès.');
    }

    public function edit($id)
    {
        $lienUtile = LienUtile::findOrFail($id);
        return view('admin.liens_utiles.edit', compact('lienUtile'));
    }

    public function update(Request $request, $id)
    {
        $lienUtile = LienUtile::findOrFail($id);
        $request->validate([
            'titre' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'type' => 'nullable|string|max:50',
        ]);

        $lienUtile->update($request->only('titre', 'url', 'type'));

        return redirect()->route('liens_utiles.index')->with('success', 'Informations mises à jour avec succès.');
    }

    public function destroy($id)
    {
        $lienUtile = LienUtile::findOrFail($id);
        $lienUtile->delete();
        return redirect()->route('liens_utiles.index')->with('success', 'Informations supprimées avec succès.');
    }

    public function show($id)
    {
        $lienUtile = LienUtile::findOrFail($id);
        return view('admin.liens_utiles.show', compact('lienUtile'));
    }
}
