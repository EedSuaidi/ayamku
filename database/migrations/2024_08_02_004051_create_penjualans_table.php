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
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelanggan_id')->constrained(
                table: 'pelanggans',
                indexName: 'penjualans_pelanggan_id'
            );
            $table->float('jumlah_ekor');
            $table->float('jumlah_berat');
            $table->integer('harga');
            $table->integer('total');
            $table->date('tanggal_penjualan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
