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
        Schema::create('programmation', function (Blueprint $table) {
            $table->id('IdProg');
            $table->date('DateProg');
            $table->time('HeureProg');

            // AJOUT : La colonne pour la salle
            $table->unsignedBigInteger('NumSalle');

            $table->unsignedBigInteger('IdFilm');

            // Clé étrangère vers la table des films
            $table->foreign('IdFilm')
                ->references('IdFilm')
                ->on('films')
                ->onDelete('cascade');

            // AJOUT : Clé étrangère vers la table des salles
            $table->foreign('NumSalle')
                ->references('NumSalle')
                ->on('salle')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programmation');
    }
};
