<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    private function autoFillLang(array &$data)
    {
        $fields = [
            'name',
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
        $categories = Categorie::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return view('admin.categories.create');
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_fr' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'name_ar' => 'nullable|string|max:255',
            'icon'    => 'nullable|string|max:255',
        ]);
        $data = $request->all();
        // Auto-fill EN + AR
        $this->autoFillLang($data);
        Categorie::create($data);

        return redirect()->route('categories.index')->with('success', 'Catégorie ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Categorie $categorie)
    // {
    //     return view('admin.categories.show', compact('categorie'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categorie = Categorie::findOrFail($id);
        return view('admin.categories.edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorie $categorie)
    {
        $request->validate([
            'name_fr' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'name_ar' => 'nullable|string|max:255',
            'icon'    => 'nullable|string|max:255',
        ]);

        $data = $request->all();
        // Auto-fill EN + AR
        $this->autoFillLang($data);

        $categorie->update($data);

        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie)
    {
        $categorie->delete();

        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès.');
    }
}
