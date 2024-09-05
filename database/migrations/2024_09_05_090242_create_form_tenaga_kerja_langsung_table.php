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
        Schema::create('form_tenaga_kerja_langsung', function (Blueprint $table) {
            $table->id();
            $table->integer('header_id');
            $table->string('uraian');
            $table->string('kewarganegaraan');
            $table->double('tkdn_kandungan');
            $table->integer('jumlah_orang');
            $table->double('gaji_perbulan');
            $table->double('alokasi_gaji');
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
        Schema::dropIfExists('form_tenaga_kerja_langsung');
    }
};
