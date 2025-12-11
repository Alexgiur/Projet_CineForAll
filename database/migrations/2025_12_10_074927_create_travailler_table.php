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
        Schema::create('travailler', function (Blueprint $table) {
            //clé étrangère de film
            $table->unsignedBigInteger('IdFilm');
            $table->foreign('IdFilm')
                ->references('IdFilm')
                ->on('films')
                ->onDelete('cascade');
            //clé étrangère de role personne
            $table->unsignedBigInteger('IdRolePer');
            $table->foreign('IdRolePer')
                ->references('IdRolePer')
                ->on('role_personne')
                ->onDelete('cascade');
            //clé étrangère de personne
            $table->unsignedBigInteger('IdPer');
            $table->foreign('IdPer')
                ->references('IdPer')
                ->on('personne')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travailler');
    }
};
