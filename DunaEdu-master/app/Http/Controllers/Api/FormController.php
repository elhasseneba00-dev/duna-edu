<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Candidature;
use App\Models\DevisRequest;
use App\Models\Email;
use App\Traits\HandlesLocalization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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
            // Canonical keys
            'nom' => 'nullable|string|max:255',
            'prenom'  => 'nullable|string|max:255',

            // Backward compatibility (frontend used these)
            'firstname' => 'nullable|string|max:255',
            'lastname' => 'nullable|string|max:255',

            'email'     => 'required|email',
            'subject'   => 'nullable|string|max:255',
            'message'   => 'required|string|max:5000',
        ]);

        $prenom = $data['prenom'] ?? $data['firstname'] ?? null;
        $nom = $data['nom'] ?? $data['lastname'] ?? null;
        $fromEmail = $data['email'];
        $subject = trim((string)($data['subject'] ?? ''));
        if ($subject === '') {
            $subject = 'Nouveau message (Contact DunaEdu)';
        }

        $replyToName = trim(implode(' ', array_filter([(string) $prenom, (string) $nom])));

        $bodyLines = [
            'Nouveau message via le formulaire de contact DunaEdu',
            '',
            'Nom: '.($nom ?: '-'),
            'Prénom: '.($prenom ?: '-'),
            'Email: '.$fromEmail,
            'Sujet: '.$subject,
            '',
            'Message:',
            $data['message'],
        ];

        try {
            Mail::raw(implode("\n", $bodyLines), function ($message) use ($fromEmail, $replyToName, $subject) {
                $message
                    ->to('dunaedu@gmail.com')
                    ->subject($subject)
                    ->replyTo($fromEmail, $replyToName !== '' ? $replyToName : null);
            });
        } catch (\Throwable $e) {
            Log::error('Contact email failed', [
                'error' => $e->getMessage(),
                'from' => $fromEmail,
            ]);

            return $this->error('Unable to send message at the moment', 500);
        }

        return $this->success(['message' => 'Message sent'], 201);
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
