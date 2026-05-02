<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash};
use App\Http\Requests\StagaireRequest;
use App\Models\Login;

class LoginController extends Controller
{
    public function index(){
        return view("index");
    }

    public function store(StagaireRequest $request){
        $request->validate([
            
        ]);

        Login::create([
            'name' => $request->name,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route("stagair.login")
            ->with("success", "Votre compte est créé avec succès !");
    }
    public function home(){
        return view('home');
    }
    public function logine(Request $request){
        $email =$request->email;
        $password =$request ->password;
        $credentials = ['email' => $email,'password' => $password];
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
           return redirect()->route('home');
        }else{
           return redirect()->route("stagair.login")
            ->with("ereur", "mote de passe ou email incorect");


        }
        
    }
    
}