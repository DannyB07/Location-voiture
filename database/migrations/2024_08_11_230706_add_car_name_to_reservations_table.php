<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCarNameToReservationsTable extends Migration
{
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            // Assurez-vous d'abord que la colonne 'terms' existe ou ajustez en conséquence
            if (!Schema::hasColumn('reservations', 'terms')) {
                // Si la colonne 'terms' n'existe pas, ne pas essayer de la référencer
                $table->boolean('terms')->default(false);
            }
            
            $table->string('car_name')->after('terms'); // Ajouter une colonne pour le nom de la voiture
        });
    }

    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropColumn('car_name');
        });
    }
}
