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
        Schema::create('header_tkdn', function (Blueprint $table) {
            $table->id();
            $table->string('penyedia_barang');
            $table->string('product_name');
            $table->string('product_type');
            $table->string('spesifikasi')->nullable();
            $table->string('standart')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('header_tkdn');
    }
};
