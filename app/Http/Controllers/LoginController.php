<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash};
use App\Models\Login;
use App\Models\Inscription;

class LoginController extends Controller
{
    // page login
    public function index(){
        return view("index");
    }

    // register
    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:login,email',
            'telephone' => 'required',
            'password' => 'required|min:6',
        ]);

        Login::create([
            'name' => $request->name,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route("stagair.login")
            ->with("success", "Compte créé avec succès");
    }

    // login
    public function logine(Request $request){

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();





            return redirect()->route('home');
        }

        return back()->with("error", "Email ou mot de passe incorrect");
    }

    
    public function home(){
        return view('home');
    }
}