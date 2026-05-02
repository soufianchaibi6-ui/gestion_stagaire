<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
// use App\Models\User;
use Illuminate\Http\Request;

class inscriptionController extends Controller
{
    public function create(){
        return view("home");
    }
    public function store(Request  $request){
        $request->validate([
            'cin'=>'required|between:1,7',
            'nom'=>'required' , 
            'prenom'=>'required',
            'sexe'=>'required',
            'telephone'=>'required',
            'email'=>'required',
            'filiere'=>'required',
            'etablissement'=>'required',
            'niveau_etude'=>'required',
            'type_stage'=>'required',
            'ville'=>'required',
            'date_debut' => 'required|date|after_or_equal:today',
            'date_fin' => 'required|date|after:date_debut',

    ]);
        $stagaire = Inscription::create  ([   
            'name' => $request->name,
            'cin'=>$request->cin,
            'nom'=>$request->nom , 
            'prenom'=>$request->prenom ,
            'sexe'=>$request->sexe ,
            'telephone'=>$request->telephone ,
            'email'=>$request->email ,
            'filiere'=>$request->filiere ,
            'etablissement'=>$request->etablissement ,
            'niveau_etude'=>$request->niveau_etude ,
            'type_stage'=>$request->type_stage ,
            'ville'=>$request->ville ,
            'date_debut'=>$request->date_debut,
            'date_fin'=>$request->date_fin,
            
            
        ]);;
        return redirect()->route('attente', $stagaire->id,); 
    }

    //page de suivi
    public function attente($id){
    $stagaire = inscription::findOrFail($id);
    return view('attente' , compact('stagaire'));

    }   
  
    
}




