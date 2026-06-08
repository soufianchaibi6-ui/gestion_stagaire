<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\{Inscription, Message};

class ChatstagairController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $stagiaire = Inscription::where('id_log', $user->id_log)->first();

        if (!$stagiaire) {
            return back()->with('error', 'Stagiaire introuvable');
        }

        $messages = Message::where('stagiaire_id', $stagiaire->id)
            ->orderBy('created_at', 'asc')
            ->get();

        return view('stagairchat', compact('user', 'messages', 'stagiaire'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'message' => 'nullable|string|max:1000',
            'file' => 'nullable|file|max:5120',
        ]);

        $user = Auth::user();

        $stagiaire = Inscription::where('id_log', $user->id_log)->first();

        if (!$stagiaire) {
            return back()->with('error', 'Stagiaire introuvable');
        }

        $filePath = null;

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('chat_files', 'public');
        }

        if (!$request->message && !$filePath) {
            return back()->with('error', 'Message ou fichier requis');
        }

        Message::create([
            'stagiaire_id' => $stagiaire->id,
            'encadrant_id' => 1,
            'sender' => 'stagiaire',
            'message' => $request->message,
            'file' => $filePath,
        ]);

        return back();
    }
}