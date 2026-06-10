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
        Schema::create('posseder_actionnaire', function (Blueprint $table) {
                $table->id();


                $table->Integer('cinema_id');
                $table->Integer('idActionnaire');

                $table->foreign('cinema_id')
                    ->references('id')->on('cinemas');

                $table->foreign('idActionnaire')
                    ->references('idActionnaire')->on('actionnaire');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posseder_actionnaire');
    }
};
