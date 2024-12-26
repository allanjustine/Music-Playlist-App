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
        Schema::create('music_bars', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->string('location');
            $table->string('genre');
            $table->integer('rating')->nullable();
            $table->integer('price')->nullable();
            $table->longText('image')->nullable();
            $table->longText('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('music_bars');
    }
};
