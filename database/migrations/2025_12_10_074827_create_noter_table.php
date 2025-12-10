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
        Schema::create('noter', function (Blueprint $table) {
            $table->integer('note');
            //clé étrangère de film
            $table->unsignedBigInteger('IdFilm');
            $table->foreign('IdFilm')
                ->references('IdFilm')
                ->on('films')
                ->onDelete('cascade');
            //clé étrangère d'utilisateur
            $table->unsignedBigInteger('IdUtilisateur');
            $table->foreign('IdUtilisateur')
                ->references('IdUtilisateur')
                ->on('Utilisateurs')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noter');
    }
};
