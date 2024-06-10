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
        Schema::create('trial_days', function (Blueprint $table) {
            $table->id();
            $table->date('date_trial');
            $table->time('start_trial')->nullable();
            $table->time('end_trial')->nullable();
            $table->string('phone');
            $table->string('full_name');
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trial_days');
    }
};
