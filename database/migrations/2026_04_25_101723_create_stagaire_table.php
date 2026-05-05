<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stagaire', function (Blueprint $table) {
            $table->id();
            $table->string('cin')->unique();
            $table->string('nom',50);
            $table->string('prenom',50);
            $table->string('sexe',10);
            $table->string('telephone',20);
            $table->string('email',50);
            $table->string('filiere');
            $table->string('etablissement');
            $table->string('niveau_etude');
            $table->string('type_stage');
            $table->string('ville');

            $table->string('status')->default('en_attente');

            $table->date('date_debut');
            $table->date('date_fin');

            $table->string('cv')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stagaire');
    }
};