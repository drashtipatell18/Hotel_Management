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
        Schema::create('rooms_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms_images');
    }
};
