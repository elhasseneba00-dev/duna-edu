<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Course;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    private function autoFillLang(array &$data)
    {
        $fields = [
            'title', 'description'
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
     * Display a listing of the modules.
     */
    public function index()
    {
        $modules = Module::with('course')->orderBy('order')->get();
        return view('admin.modules.index', compact('modules'));
    }

    /**
     * Show the form for creating a new module.
     */
    public function create()
    {
        $courses = Course::all();
        return view('admin.modules.create', compact('courses'));
    }

    /**
     * Store a newly created module in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title_fr' => 'required|string|max:255',
            'description_fr' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);
        $data = $request->all();
        $this->autoFillLang($data);

        Module::create($data);

        return redirect()->route('modules.index')
                         ->with('success', 'Informations enregistrées avec succès.');
    }

    /**
     * Show the form for editing the specified module.
     */
    public function edit(Module $module)
    {
        $courses = Course::all();
        return view('admin.modules.edit', compact('module', 'courses'));
    }

    public function show(Module $module)
    {
        $courses = Course::all();
        return view('admin.modules.show', compact('module', 'courses'));
    }

    /**
     * Update the specified module in storage.
     */
    public function update(Request $request, Module $module)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title_fr' => 'required|string|max:255',
            'description_fr' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);
        $data = $request->all();
        $this->autoFillLang($data);
        $module->update($data);

        return redirect()->route('modules.index')
                         ->with('success', 'Informations mises à jour avec succès.');
    }

    /**
     * Remove the specified module from storage.
     */
    public function destroy(Module $module)
    {
        $module->delete();

        return redirect()->route('modules.index')
                         ->with('success', 'Informations supprimées avec succès');
    }
}
