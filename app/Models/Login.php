<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Inscription;

class Login extends Authenticatable
{
    use HasFactory;

    protected $table = 'login';

    protected $fillable = [
        'name',
        'prenom',
        'email',
        'telephone',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    // relation: user has many inscriptions
    public function inscriptions()
    {
        return $this->hasMany(Inscription::class, 'user_id');
    }
}