<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{
    private function autoFillLang(array &$data)
    {
        $fields = [
            'title',
            'content',
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
     * Liste des leçons
     */
    public function index()
    {
        $lessons = Lesson::with('module')->orderBy('order')->get();
        return view('admin.lessons.index', compact('lessons'));
    }

    /**
     * Formulaire création
     */
    public function create()
    {
        $modules = Module::all();
        return view('admin.lessons.create', compact('modules'));
    }

    /**
     * Stocker une leçon
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'module_id' => 'required|exists:modules,id',
            'title_fr' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'title_ar' => 'nullable|string|max:255',
            'content_fr' => 'nullable|string',
            'content_en' => 'nullable|string',
            'content_ar' => 'nullable|string',
            'content_type' => 'required|in:video,article,quiz,assignment,resource',
            'video_url' => 'nullable|url',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx,pptx,zip',
            'duration_seconds' => 'nullable|integer',
            'is_locked' => 'nullable|boolean',
            'order' => 'nullable|integer',
        ]);
        $data = $request->except(['attachment']);
        // Auto-fill EN + AR
        $this->autoFillLang($data);
        // Gestion de l'upload du fichier attaché
        if ($request->hasFile('attachment')) {
            $data['attachment'] = $request->file('attachment')->store('lessons', 'public');
        }

        Lesson::create($data);

        return redirect()->route('lessons.index')->with('success', 'Leçon créée avec succès.');
    }

    /**
     * Formulaire édition
     */
    public function edit(Lesson $lesson)
    {
        $modules = Module::all();
        return view('admin.lessons.edit', compact('lesson', 'modules'));
    }

    /**
     * Mettre à jour la leçon
     */
    public function update(Request $request, Lesson $lesson)
    {
        $data = $request->validate([
            'module_id' => 'required|exists:modules,id',
            'title_fr' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'title_ar' => 'nullable|string|max:255',
            'content_fr' => 'nullable|string',
            'content_en' => 'nullable|string',
            'content_ar' => 'nullable|string',
            'content_type' => 'required|in:video,article,quiz,assignment,resource',
            'video_url' => 'nullable|url',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx,pptx,zip',
            'duration_seconds' => 'nullable|integer',
            'is_locked' => 'nullable|boolean',
            'order' => 'nullable|integer',
        ]);
        $data = $request->except(['attachment']);
        // Auto-fill EN + AR
        $this->autoFillLang($data);
        // Gestion de l'upload du fichier attaché
        if ($request->hasFile('attachment')) {
            // Supprimer l'ancien fichier si existant
            if ($lesson->attachment && Storage::disk('public')->exists($lesson->attachment)) {
                Storage::disk('public')->delete($lesson->attachment);
            }
            $data['attachment'] = $request->file('attachment')->store('lessons', 'public');
        }

        $lesson->update($data);

        return redirect()->route('lessons.index')->with('success', 'Leçon mise à jour avec succès.');
    }

    /**
     * Supprimer la leçon (soft delete)
     */
    public function destroy(Lesson $lesson)
    {
        // Supprimer le fichier attaché si existant
        if ($lesson->attachment && Storage::disk('public')->exists($lesson->attachment)) {
            Storage::disk('public')->delete($lesson->attachment);
        }

        $lesson->delete();
        return redirect()->route('lessons.index')->with('success', 'Leçon supprimée.');
    }

    /**
     * Afficher une leçon
     */
    public function show(Lesson $lesson)
    {
        return view('admin.lessons.show', compact('lesson'));
    }
}
