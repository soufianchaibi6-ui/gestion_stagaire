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
        'id_log',
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
    public function inscriptionstagaire(){
        return $this->belongsTo(Login::class , 'id_log','id_log');
    }
    public function messages()
{
    return $this->hasMany(Message::class, 'stagiaire_id');
}


}