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
            $table->unsignedBigInteger('IdFilm');
            $table->foreign('IdFilm')
                ->references('IdFilm')
                ->on('films')
                ->onDelete('cascade');

/*            $table->unsignedBigInteger('NumSalle');*/
/*
            $table->foreign('NumSalle')
                ->references('NumSalle')
                ->on('salle')
                ->onDelete('cascade');*/

            $table->timestamps();
            $table->engine = 'InnoDB';
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
