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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('class_name');
            $table->bigInteger('id_kategori_class');
            $table->string('image');
            $table->string('description');
            $table->decimal('class_price', 9, 0)->nullable();
            $table->integer('trainer_id');
            $table->datetime('schedule');
            $table->integer('duration_minutes');
            $table->integer('capacity');
            $table->enum('status',['active','inactive']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
