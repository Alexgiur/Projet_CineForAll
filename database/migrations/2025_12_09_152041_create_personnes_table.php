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
        Schema::create('personnes', function (Blueprint $table) {
            $table->id('Idper');
            $table->string('NomPer');
            $table->string('PrePer');
            $table->date('DateNaissancePer');
            $table->string('NationalitePer');
            $table->string('BiographiePer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnes');
    }
};
