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
        Schema::create('salle', function (Blueprint $table) {
            $table->id('NumSalle');
            $table->integer('Capacite');
            $table->unsignedBigInteger('IdProg');
            $table->foreign('IdProg')
                ->references('IdProg')
                ->on('programmation')
                ->onDelete('cascade');
            $table->unsignedBigInteger('IdCinema');
            $table->foreign('IdCinema')
                ->references('IdCinema')
                ->on('Cinema')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salle');
    }
};
