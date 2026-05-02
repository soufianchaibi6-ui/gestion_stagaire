<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $table = 'stagaire';
    use HasFactory;

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
        'cv',
    ];
}
