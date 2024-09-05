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
        Schema::create('form_mesin_sewa', function (Blueprint $table) {
            $table->id();
            $table->integer('header_id');
            $table->string('uraian');
            $table->string('spesifikasi');
            $table->string('pemasok');
            $table->string('kepemilikan_dibuat');
            $table->string('kepemilikan_dimiliki');
            $table->double('alokasi_dalam_negri');
            $table->integer('jumlah_unit');
            $table->double('biaya_perbulan');
            $table->double('alokasi_pengunaan');
            $table->double('kdn');
            $table->double('kln');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_mesin_sewa');
    }
};
