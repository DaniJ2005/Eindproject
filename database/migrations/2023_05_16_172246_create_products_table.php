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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            
            $table->string('name', 12)->nullable(false);
            $table->decimal('buy_price', 6, 2);
            $table->decimal('sell_price', 6, 2);
            $table->integer('stock')->nullable(false);
            $table->integer('min_stock')->nullable(false);
            $table->integer('max_stock')->nullable(false);
            $table->integer('location');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
