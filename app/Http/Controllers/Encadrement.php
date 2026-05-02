<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ViewErrorBag;

class Encadrement extends Controller
{
    public function En_index(){
        return view('encadrement/login_en');
    }
    public function hadi(){
        $stagiaires = Inscription::paginate(10); 
        return view('encadrement.en_homme', compact('stagiaires'));
    }
     public function login_en(Request $request){
        $email_en =$request->email_en;
        $password_en =$request ->password_en;
        $credentials = ['email' => $email_en,'password' => $password_en];
        if(Auth::guard('enca')-> attempt($credentials)){
            $request->session()->regenerate();
           return redirect()->route('en_home');
        }else{
            return redirect()->route('login_en')
            ->with("ereur", "le mot de passe ou email incorect");
    


        }
        
    }
    
    public function show($id)
{
    $stagiaire = Inscription::findOrFail($id);

    return view('encadrement.details', compact('stagiaire'));
}


public function accepter($id)
{
    $stagiaire = Inscription::findOrFail($id);
    $stagiaire->status = 'accepté';
    $stagiaire->save();

    return redirect()->back()->with('success', 'Stagiaire accepté');
}

public function refuser($id)
{
    $stagiaire = Inscription::findOrFail($id);
    $stagiaire->status = 'refusé';
    $stagiaire->save();

    return redirect()->back()->with('success', 'Stagiaire refusé');
}
}
