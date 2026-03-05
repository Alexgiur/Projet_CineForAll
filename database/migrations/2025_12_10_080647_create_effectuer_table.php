<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('effectuer', function (Blueprint $table) {
            // Clé étrangère vers l'utilisateur
            $table->unsignedBigInteger('IdUtilisateur');
            $table->foreign('IdUtilisateur')->references('IdUtilisateur')->on('utilisateur')->onDelete('cascade');

            // Clé étrangère vers la réservation
            $table->unsignedBigInteger('IdRes');
            $table->foreign('IdRes')->references('IdRes')->on('reservation')->onDelete('cascade');

            // AJOUT : Clé étrangère vers la séance (programmation)
            $table->unsignedBigInteger('IdProg');
            $table->foreign('IdProg')->references('IdProg')->on('programmation')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('effectuer');
    }
};
