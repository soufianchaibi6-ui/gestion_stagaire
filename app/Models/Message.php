<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';

    protected $fillable = [
        'stagiaire_id',
        'encadrant_id',
        'sender',
        'message',
        'file',
        'is_read',
    ];

    public function stagiaire()
    {
        return $this->belongsTo(Inscription::class, 'stagiaire_id');
    }

    public function encadrant()
    {
        return $this->belongsTo(en_logine::class, 'encadrant_id');
    }
}