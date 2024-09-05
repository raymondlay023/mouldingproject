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
        Schema::create('form_bahan_baku_langsung', function (Blueprint $table) {
            $table->id();
            $table->integer('header_id');
            $table->string('material_name');
            $table->string('satuan_material');
            $table->string('negara_asal');
            $table->string('pemasok');
            $table->double('tkdn_kandungan');
            $table->double('jumlah_pemakaian');
            $table->double('harga_satuan_material');
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
        Schema::dropIfExists('form_bahan_baku_langsung');
    }
};
