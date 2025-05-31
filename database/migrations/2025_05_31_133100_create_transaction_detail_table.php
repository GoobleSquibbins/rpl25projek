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
        Schema::create('transaction_detail', function (Blueprint $table) {
            $table->id('detail_id');
            $table->unsignedBigInteger('transaction_id');
            $table->string('speed');
            $table->string('item');
            $table->string('qty');
            $table->decimal('subtotal');
            $table->dateTime('finish_date');
            $table->enum('status', ['pending', 'in_process', 'done', 'picked_up']);
            $table->timestamps();

            $table->foreign('transaction_id')->references('transaction_id')->on('transaction')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_detail');
    }
};
