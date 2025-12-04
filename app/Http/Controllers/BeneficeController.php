<?php

namespace App\Http\Controllers;

use App\Models\Benefice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeneficeController extends Controller
{
    private function autoFillLang(array &$data)
    {
        $fields = [
            'text',
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
    public function index()
    {
        $benefices = Benefice::orderBy('order')->get();
        return view('admin.benefices.index', compact('benefices'));
    }

    public function create()
    {
        return view('admin.benefices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'text_fr' => 'required|string',
            'text_en' => 'nullable|string',
            'text_ar' => 'nullable|string',
            'order'   => 'nullable|integer',
        ]);

        $data = $request->all();
        // Auto-fill EN + AR
        $this->autoFillLang($data);

        Benefice::create($data);

        return redirect()->route('benefices.index')->with('success', 'Informations enregistrées avec succès.');
    }

    public function edit($id)
    {
        $benefice = Benefice::findOrFail($id);
        return view('admin.benefices.edit', compact('benefice'));
    }

    public function update(Request $request, $id)
    {
        $benefice = Benefice::findOrFail($id);

        $request->validate([
            'text_fr' => 'required|string',
            'text_en' => 'nullable|string',
            'text_ar' => 'nullable|string',
            'order'   => 'nullable|integer',
        ]);

        $data = $request->all();
        // Auto-fill EN + AR
        $this->autoFillLang($data);

        $benefice->update($data);

        return redirect()->route('benefices.index')->with('success', 'Informations mises à jour avec succès.');
    }

    public function destroy($id)
    {
        $benefice = Benefice::findOrFail($id);

        $benefice->delete();

        return redirect()->route('benefices.index')->with('success', 'Informations supprimées avec succès.');
    }

    public function show($id)
    {
        $benefice = Benefice::findOrFail($id);
        return view('admin.benefices.show', compact('benefice'));
    }
}
