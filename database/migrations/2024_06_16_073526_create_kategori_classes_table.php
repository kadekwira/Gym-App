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
        Schema::create('kategori_classes', function (Blueprint $table) {
            $table->id();
            $table->string("nama_kategori");
            $table->string("image");
            $table->text("description");
            $table->enum("type_image",['img','icon']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_classes');
    }
};
