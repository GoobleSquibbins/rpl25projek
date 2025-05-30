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
            $table->string('cashier_name');
            $table->date(column: 'transaction_date');
            $table->date('pickup_date');
            $table->string('speed');
            $table->string('item');
            $table->string('qty');
            $table->decimal('total_price');
            $table->enum('status', ['pending', 'in_process', 'done', 'picked_up']);
            $table->string('notes')->nullable();
            $table->timestamps();
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
