<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class en_logine extends Model
{
   
    protected $table = 'en_login';

    protected $fillable = [
        'name',
        'prenom',
        'email',
        'telphone',
        'specialiter',
        'password',
    ];

    protected $hidden = [
        'password_en',
    ];
}
