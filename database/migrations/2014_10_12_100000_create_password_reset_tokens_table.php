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
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email', 100); // Réduire la longueur
            $table->string('token', 100); // Réduire la longueur
            $table->timestamp('created_at')->nullable();

            // Définir une clé primaire composite avec des colonnes plus courtes
            $table->primary(['email', 'token']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('password_reset_tokens');
    }
};
