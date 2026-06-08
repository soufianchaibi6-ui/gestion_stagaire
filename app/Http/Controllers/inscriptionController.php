<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\{Inscription, Login};

class InscriptionController extends Controller
{
    

    // afficher formulaire
    public function create(){
        return view("home");
    }

    // enregistrer stagiaire
    public function store(Request $request){

        $request->validate([
            
            'cin' => 'required|max:7|unique:stagaire,cin',
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
            'date_debut' => 'required|date|after_or_equal:today',
            'date_fin' => 'required|date|after:date_debut',
            'cv' => 'required|mimes:pdf,doc,docx|max:20000',
        ]);

        // upload CV
        $cvPath = null;
        if($request->hasFile('cv')){
            $cvPath = $request->file('cv')->store('cvs', 'public');
        }

        // create inscription
        $stagaire = Inscription::create([
            'id_log'=> Auth::user()->id_log,
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
            'ville'=> $request->ville,
            'date_debut'=> $request->date_debut,
            'date_fin'=> $request->date_fin,
            'cv' => $cvPath,
        ]);

        return redirect()->route('attente', $stagaire->id);
    }

    // page attente (محمي)
public function attente($id)
{
    $stagaire = Inscription::findOrFail($id);

    if ($stagaire->id_log !== Auth::user()->id_log) {
        abort(403, 'Accès refusé');
    }

    //  Si accepté → rediriger vers chat
    if ($stagaire->status === 'accepté') {
        return redirect()->route('stagaire.chat');
    }

    return view('attente', compact('stagaire'));
}
public function supprimerDemande($id)
{
    $stagiaire = Inscription::findOrFail($id);
    $stagiaire->delete();
    
    return redirect()->route('home')
        ->with('success', 'Demande supprimée, vous pouvez refaire une nouvelle demande');
}

}