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
        Schema::create('financial_gyms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_transactions');
            $table->foreign('id_transactions')->references('id')->on('transactions');
            $table->date('date');
            $table->string('category');
            $table->string('payment_method');
            $table->integer('total_transaction');
            $table->integer('total_financial');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_gyms');
    }
};
