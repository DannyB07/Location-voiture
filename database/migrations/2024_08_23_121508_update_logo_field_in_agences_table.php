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
        Schema::table('agences', function (Blueprint $table) {
             // Rendre le champ 'logo' nullable et définir une valeur par défaut
             $table->string('logo')->nullable()->default('37.png')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agences', function (Blueprint $table) {
            // Revenir à l'état précédent si besoin (par exemple, enlever la valeur par défaut)
            $table->string('logo')->nullable(false)->default(null)->change();
        });
    }
};
