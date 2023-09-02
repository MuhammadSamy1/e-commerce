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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->on('customers')->onDelete('cascade');
            $table->foreignId('user_id')->on('users')->onDelete('cascade');
            $table->foreignId('category_id')->on('categories')->onDelete('cascade');
            $table->foreignId('product_id')->on('products')->onDelete('cascade');
            $table->decimal('amount',8,2);
            $table->string('quantity')->nullable();
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
