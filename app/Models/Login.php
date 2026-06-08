<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Inscription;

class Login extends Authenticatable
{
    use HasFactory;

    protected $table = 'login';
    protected $primaryKey = 'id_log';
    public $incrementing = true;
    protected $keyType = 'int';

    public function getAuthIdentifierName()
    {
        return 'id_log';
    }

    public function getAuthIdentifier()
    {
        return $this->id_log;
    }

    protected $fillable = [
        'name', 'prenom', 'email', 'telephone', 'password',
    ];

    protected $hidden = ['password'];

    public function inscriptions()
    {
        return $this->hasOne(Inscription::class, 'id_log');
    }
}