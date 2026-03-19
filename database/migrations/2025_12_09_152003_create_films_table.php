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
        Schema::create('films', function (Blueprint $table) {
            $table->id('IdFilm');
            $table->string('TitreFilm');
            $table->integer('LongueurFilm');
            $table->DATE('DateSortieFilm');
            $table->text('ResumeFilm');
            $table->string('LangueFilm');
            $table->boolean('TroisDOuNon');
            $table->string('AfficheFilm')->nullable();
            //clé étrangère de genre film
            $table->unsignedBigInteger('IdGenreFilm');
            $table->foreign('IdGenreFilm')
                ->references('IdGenreFilm')
                ->on('genre_film')
                ->onDelete('cascade');
            $table->timestamps();
           $table->engine = 'InnoDB';
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
