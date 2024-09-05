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
        Schema::create('room_type_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('roomType_id')->nullable();
            $table->string('room_image')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('roomType_id')->references('id')->on('room_types')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_type_images');
    }
};
