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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userId'); // Foreign key column
            $table->decimal('total_price', 10, 2);
            $table->string('metode_pembayaran');
            $table->string('nama_pengirim')->nullable();
            $table->string('norek_pengirim')->nullable();
            $table->string('nomor_transaksi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
