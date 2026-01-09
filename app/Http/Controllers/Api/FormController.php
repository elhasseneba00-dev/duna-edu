<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Candidature;
use App\Models\ContactMessage;
use App\Models\DevisRequest;
use App\Models\Email;
use App\Traits\HandlesLocalization;
use Illuminate\Http\Request;

class FormController extends Controller
{
    use HandlesLocalization;

    public function newsletter(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|unique:emails,email',
        ]);

        Email::create([
            'email' => $data['email'],
            'type'  => 'newsletter',
        ]);

        return $this->success(['message' => 'Subscribed'], 201);
    }

    //Les formulaires à implémnter
    public function contact(Request $request)
    {
        $data = $request->validate([
            'nom' => 'nullable|string|max:255',
            'prenom'  => 'nullable|string|max:255',
            'email'     => 'required|email',
            'subject'   => 'nullable|string|max:255',
            'message'   => 'required|string',
        ]);

        ContactMessage::create($data);

        return $this->success(['message' => 'Contact stored'], 201);
    }

    public function devis(Request $request)
    {
        $data = $request->validate([
            'company'      => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'email'        => 'required|email',
            'telephone'        => 'nullable|string|max:50',
            'projectType'  => 'nullable|string|max:100',
            'budget'       => 'nullable|string|max:100',
            'message'      => 'required|string',
        ]);

        DevisRequest::create([
            'company'      => $data['company'],
            'contact_name' => $data['contact_name'],
            'email'        => $data['email'],
            'telephone'        => $data['telephone'] ?? null,
            'project_type' => $data['projectType'] ?? null,
            'budget'       => $data['budget'] ?? null,
            'message'      => $data['message'],
        ]);

        return $this->success(['message' => 'Devis stored'], 201);
    }

    public function candidature(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom'  => 'required|string|max:255',
            'email'     => 'required|email',
            'telephone'     => 'nullable|string|max:50',
            'role'      => 'nullable|string|max:255',
            'message'   => 'required|string',
        ]);

        Candidature::create($data);

        return $this->success(['message' => 'Candidature stored'], 201);
    }
}
