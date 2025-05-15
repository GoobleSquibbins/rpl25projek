<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaction_item', function (Blueprint $table) {
            $table->id('transaction_item_id');

            $table->unsignedBigInteger('transaction_id');
            $table->unsignedBigInteger('item_id');

            $table->decimal('weight');
            $table->decimal('unit_price');
            $table->decimal('subtotal');
            $table->timestamps();

            $table->foreign('transaction_id')->references('transaction_id')->on('transaction')->onDelete('cascade');
            $table->foreign('item_id')->references('item_id')->on('item')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_item');
    }
};
