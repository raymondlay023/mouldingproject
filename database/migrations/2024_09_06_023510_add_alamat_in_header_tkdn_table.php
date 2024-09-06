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
        Schema::table('header_tkdn', function (Blueprint $table) {
            $table->string('alamat')->nullable()->after('penyedia_barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('header_tkdn', function (Blueprint $table) {
            $table->dropColumn('alamat');
        });
    }
};
