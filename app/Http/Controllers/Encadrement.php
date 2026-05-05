<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ViewErrorBag;

use App\Models\Inscription;

class Encadrement extends Controller
{
    public function En_index(){
        return view('encadrement/login_en');
    }
    public function hadi(){
        $stagiaires = Inscription::where('status', 'en_attente')->paginate(10); 
        return view('encadrement.en_homme', compact('stagiaires'));
    }
     public function login_en(Request $request){
        $email_en =$request->email_en;
        $password_en =$request ->password_en;
        $credentials = ['email' => $email_en,'password' => $password_en];
        if(Auth::guard('enca')-> attempt($credentials)){
            $request->session()->regenerate();
             session([
            'enca_logged' => true,
            'enca_email' => $email_en
        ]);
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
public function showCv($id)
{
    $stagiaire = Inscription::findOrFail($id);
    $path = storage_path('app/public/' . $stagiaire->cv);

    return response()->file($path);
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
