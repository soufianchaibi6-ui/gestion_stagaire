<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
    $table->id();

    $table->foreignId('stagiaire_id')
        ->constraints('inscriptions')
        ->onDelete('cascade');

    $table->foreignId('encadrant_id')
        ->constraints('en_login')
        ->onDelete('cascade');

    $table->enum('sender', ['stagiaire', 'encadrant']);

    $table->text('message')->nullable();
    $table->string('file')->nullable();

    $table->boolean('is_read')->default(false);

    $table->timestamps();
});
    }

    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};