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
        Schema::create('sell_products', function (Blueprint $table) {
          $table->unsignedBigInteger('sell_order_id');
          $table->unsignedBigInteger('product_id');
          $table->integer('quantity');

          $table->foreign('sell_order_id')->references('id')->on('sell_orders')->onDelete('cascade');
          $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sell_products');
    }
};
