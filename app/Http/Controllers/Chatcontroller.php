<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\Request;

class Chatcontroller extends Controller
{
    // public function Chat(){
    //     return view('listchat');
    // } 
    public function Chat(){
    $stagiaires = Inscription::where('status', 'accepte')
        ->paginate(10); 
        return view('listchat', compact('stagiaires'));
    }
    public function show($id)
{
    $stagiaire = Inscription::findOrFail($id);

    return view('chat', compact('stagiaire'));
}
}

