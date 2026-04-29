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
        $stagiaires = Inscription::all(); 
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
    
}
