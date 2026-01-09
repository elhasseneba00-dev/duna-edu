<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    private function autoFillLang(array &$data)
    {
        $fields = [
            'name', 'slug'
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
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_fr' => 'required|string|max:255',
        ]);
        $data = $request->all();
        // Auto-fill EN + AR
        $this->autoFillLang($data);
        $data['slug_fr'] = Str::slug($request->name_fr);
        $data['slug_en'] = Str::slug($data['name_en']);
        $data['slug_ar'] = Str::slug($data['name_ar']);
        Tag::create($data);

        return redirect()->route('tags.index')->with('success', 'Informations enregistrées avec succès.');
    }

    public function show(Tag $tag)
    {
        $tag->load('courses');
        return view('admin.tags.show', compact('tag'));
    }

    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $data = $request->validate([
            'name_fr' => 'required|string|max:255',
        ]);
        $data = $request->all();
        // Auto-fill EN + AR
        $this->autoFillLang($data);
        $data['slug_fr'] = Str::slug($request->name_fr);
        $data['slug_en'] = Str::slug($data['name_en']);
        $data['slug_ar'] = Str::slug($data['name_ar']);
        $tag->update($data);

        return redirect()->route('tags.index')->with('success', 'Informations mises à jour avec succès.');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'Informations supprimées avec succès.');
    }
}
