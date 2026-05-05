<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Login;

class Inscription extends Model
{
    use HasFactory;

    protected $table = 'stagaire';

    protected $fillable = [
        'cin',
        'nom',
        'prenom',
        'sexe',
        'telephone',
        'email',
        'filiere',
        'etablissement',
        'niveau_etude',
        'type_stage',
        'ville',
        'status',
        'date_debut',
        'date_fin',
        'cv',
    ];


}