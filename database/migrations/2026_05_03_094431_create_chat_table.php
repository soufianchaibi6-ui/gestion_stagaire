<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id')
                ->constrained('en_login')
                ->onDelete('cascade');

            $table->foreignId('receiver_id')
                ->constrained('login')
                ->onDelete('cascade');
        
            $table->string('message_enca');
            $table->string('image');
            $table->string('fichier');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat');
    }
};
