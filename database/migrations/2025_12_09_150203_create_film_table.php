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
        Schema::create('film', function (Blueprint $table) {
            $table->id();
            $table->string('TitreFilm');
            $table->integer('LongeurFilm');
            $table->DATE('DateSortieFilm');
            $table->text('ResumeFilm');
            $table->string('LangueFilm');
            $table->boolean('3DOuNon');
            $table->string('AfficheFilm');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('film');
    }
};
