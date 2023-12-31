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
        Schema::create('notas', function (Blueprint $table) {
            $table->id('KodeNota');
            $table->foreignId('KodeTenan')->references('KodeTenan')->on('tenans');
            $table->foreignId('KodeKasir')->references('KodeKasir')->on('kasirs');
            $table->date('TglNota');
            $table->time('JamNota');
            $table->double('JumlahBelanja');
            $table->double('Diskon')->default(0);
            $table->double('Total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};
