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
        Schema::create('effectuer', function (Blueprint $table) {
            //clé étrangère d'utilisateur
            $table->unsignedBigInteger('IdUtilisateur');
            $table->foreign('IdUtilisateur')
                ->references('IdUtilisateur')
                ->on('Utilisateurs')
                ->onDelete('cascade');
            //clé étrangère de reservation
            $table->unsignedBigInteger('IdRes');
            $table->foreign('IdRes')
                ->references('IdRes')
                ->on('reservation')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('effectuer');
    }
};
