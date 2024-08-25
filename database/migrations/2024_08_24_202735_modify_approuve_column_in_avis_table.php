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
        Schema::table('avis', function (Blueprint $table) {
             // Modifier la colonne 'approuve' pour qu'elle soit de type boolean
             $table->boolean('approuve')->default(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('avis', function (Blueprint $table) {
            // Revenir à l'ancien type de la colonne 'approuve'
            // Ici, vous devez spécifier le type d'origine de la colonne, par exemple 'string'
            $table->string('approuve')->change();
        });
    }
};
