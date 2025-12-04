<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function index()
    {
        $emails = Email::all();
        return view('admin.emails.index', compact('emails'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:emails,email',
            'type' => 'nullable|string|max:50',
        ]);

        Email::create($request->only('email', 'type'));

        return redirect()->route('emails.index')->with('success', 'Informations enregistrées avec succès.');
    }

    public function edit(Email $email)
    {
        return view('admin.emails.edit', compact('email'));
    }

    public function update(Request $request, Email $email)
    {
        $request->validate([
            'email' => 'required|email|unique:emails,email,' . $email->id,
            'type' => 'nullable|string|max:50',
        ]);

        $email->update($request->only('email', 'type'));

        return redirect()->route('emails.index')->with('success', 'Informations mises à jour avec succès.');
    }

    public function destroy(Email $email)
    {
        $email->delete();
        return redirect()->route('emails.index')->with('success', 'Informations supprimées avec succès.');
    }

    public function show(Email $email)
    {
        return view('admin.emails.show', compact('email'));
    }
}
