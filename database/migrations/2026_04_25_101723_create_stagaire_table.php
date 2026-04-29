<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;
use Laravel\Prompts\Table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stagaire', function (Blueprint $table) {
            $table->id();
            $table->string('cin')->Unique();
            $table->string('nom' ,50);
            $table->string('prenom' ,50);
            $table->string('sexe' ,10);
            $table->string('telephone' ,10);
            $table->string('email',50);
            $table->string('filiere' );
            $table->string('etablissement');
            $table->string('niveau_etude');
            $table->string('type_stage');
            $table->string('ville');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('status')->default("en_attente");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stagaire');
    }
};
