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
        Schema::create('form_tenaga_kerja_langsung_lainnya', function (Blueprint $table) {
            $table->id();
            $table->integer('header_id');
            $table->string('uraian');
            $table->string('pemasok');
            $table->double('tkdn_kandungan');
            $table->integer('jumlah');
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
        Schema::dropIfExists('form_tenaga_kerja_langsung_lainnya');
    }
};
