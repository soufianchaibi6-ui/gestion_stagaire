<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\{EnLogin, Inscription, Message, en_logine};

class Chatcontroller extends Controller
{
    // list des stagiaires
    public function Chat()
    {
        $stagiaires = Inscription::where('status', 'accepte')
            ->paginate(10);

        return view('listchat', compact('stagiaires'));
    }

    // open chat
    public function show($id)
    {
        $stagiaire = Inscription::findOrFail($id);

        $messages = Message::where('stagiaire_id', $stagiaire->id)
            ->orderBy('created_at', 'asc')
            ->get();

        return view('chat', compact('stagiaire', 'messages'));
    }

    // send message + file
    public function send(Request $request, $id)
    {
        $request->validate([
            'message' => 'nullable|string|max:1000',
            'file'    => 'nullable|file|max:5120', // 5MB
        ]);

        // encadrant logged in
        $encadrant = session('encadrant');

        // fallback 
        if (!$encadrant) {
            $encadrant = en_logine::first();
        }

        if (!$encadrant) {
            return back()->with('error', 'Encadrant not found');
        }

        $filePath = null;

        // upload file
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('chat_files', 'public');
        }

        // prevent empty message
        if (!$request->message && !$filePath) {
            return back()->with('error', 'Message or file required');
        }

        Message::create([
            'stagiaire_id' => $id,
            'encadrant_id' => $encadrant->id,
            'sender'       => 'encadrant',
            'message'      => $request->message,
            'file'         => $filePath,
        ]);

        return back();
    }
}