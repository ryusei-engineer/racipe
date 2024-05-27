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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->string('title');
            $table->string('cooking_img1');
            $table->string('cooking_img2')->nullable();
            $table->string('cooking_img3')->nullable();
            $table->string('cooking_img4')->nullable();
            $table->text('ingredient');
            $table->text('procedure');
            $table->integer('time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
