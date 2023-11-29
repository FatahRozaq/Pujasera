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
        Schema::create('barang_notas', function (Blueprint $table) {
            $table->string('KodeNota');
            $table->string('KodeBarang');
            $table->integer('JumlahBarang');
            $table->double('HargaSatuan');
            $table->double('Jumlah');

            $table->primary(['KodeNota', 'KodeBarang']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_notas');
    }
};
