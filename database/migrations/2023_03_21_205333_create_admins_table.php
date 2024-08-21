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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('first_name')->default('admin');
            $table->string('last_name')->default('admin');;
            $table->string('username', 191)->unique(); // Limite la longueur à 191 caractères
            $table->string('email', 191)->unique();    // Limite la longueur à 191 caractères
            $table->string('password')->default('12345678');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
