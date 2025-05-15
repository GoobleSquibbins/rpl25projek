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
        Schema::create('transaction', function (Blueprint $table) {
            $table->id('transaction_id');
            $table->string('invoice_id');
            $table->string('client_name');
            $table->unsignedBigInteger('cashier_id');
            $table->date('transaction_date');
            $table->date('pickup_date');
            $table->unsignedBigInteger('speed_id');
            $table->decimal('total_price');
            $table->enum('status', ['pending', 'in_process', 'done', 'picked_up']);
            $table->string('notes');
            $table->timestamps();

            $table->foreign('cashier_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('speed_id')->references('speed_id')->on('speed')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};
