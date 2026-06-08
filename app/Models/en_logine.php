<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class en_logine extends Authenticatable
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
        'password', 
    ];
    public function messages()
{
    return $this->hasMany(Message::class, 'encadrant_id');
}
}