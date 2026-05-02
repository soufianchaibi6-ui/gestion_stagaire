<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    // afficher formulaire
    public function create(){
        return view("home");
    }

    // enregistrer stagiaire
    public function store(Request $request){

        // ✅ validation
        $request->validate([
            'cin' => 'required|max:7',
            'nom' => 'required',
            'prenom' => 'required',
            'sexe' => 'required',
            'telephone' => 'required',
            'email' => 'required|email',
            'filiere' => 'required',
            'etablissement' => 'required',
            'niveau_etude' => 'required',
            'type_stage' => 'required',
            'ville' => 'required',
            'cv' => 'required|mimes:pdf,doc,docx,pptx|max:200000', // CV
        ]);

        // ✅ upload CV
        $cvPath = null;
        if($request->hasFile('cv')){
            $cvPath = $request->file('cv')->store('cvs', 'public');
        }

        // ✅ insert data
        Inscription::create([
            'cin' => $request->cin,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'sexe' => $request->sexe,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'filiere' => $request->filiere,
            'etablissement' => $request->etablissement,
            'niveau_etude' => $request->niveau_etude,
            'type_stage' => $request->type_stage,
            'ville' => $request->ville,
            'cv' => $cvPath,
        ]);

        return redirect()->back()->with('success', 'Inscription réussie !');
    }
}