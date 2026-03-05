<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservation', function (Blueprint $table) {
            $table->id('IdRes');
            $table->date('DateDeRes'); // On garde le nom DateDeRes comme dans votre fichier
            $table->integer('NbPlacesRes'); // AJOUT : Colonne pour le nombre de places
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservation');
    }
};
