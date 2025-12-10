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
        Schema::create('utilisateur', function (Blueprint $table) {
            $table->id('IdUtilisateur');
            $table->string('LoginUti');
            $table->string('MdpUti');
            $table->unsignedBigInteger('IdTypeFilm');
            $table->foreign('IdTypeFilm')
                ->references('IdTypeFilm')
                ->on('type_role_uti')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateur');
    }
};
