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
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('token', 191); // Assurez-vous que la longueur est correcte
            $table->string('tokenable_type', 100); // Réduire la longueur
            $table->bigInteger('tokenable_id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('expires_at')->nullable();

            // Définir une contrainte unique sur token
            $table->unique('token');

            // Utiliser une longueur plus courte pour le champ composite
            $table->index(['tokenable_type', 'tokenable_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
