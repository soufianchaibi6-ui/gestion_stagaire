<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $table = 'login';
    protected $fillable = [
        'name',
        'prenom',
        'email',
        'telephone',
        'password'
    ];
}
