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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('productId');
            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('productId')->references('id')->on('products');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->decimal('total_price', 10, 2);
            $table->boolean('is_checked_out')->default(false);
            $table->timestamp('checkout_date')->nullable();
            $table->string('shipping_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
