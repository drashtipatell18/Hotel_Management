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
        Schema::create('price_managers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_type_id')->nullable();
            $table->decimal('monday_price', 8, 2)->nullable();
            $table->decimal('tuesday_price', 8, 2)->nullable();
            $table->decimal('wednesday_price', 8, 2)->nullable();
            $table->decimal('thursday_price', 8, 2)->nullable();
            $table->decimal('friday_price', 8, 2)->nullable();
            $table->decimal('saturday_price', 8, 2)->nullable();
            $table->decimal('sunday_price', 8, 2)->nullable();

            $table->timestamps();
            $table->softDeletes();
            $table->foreign('room_type_id')->references('id')->on('room_types')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('price_managers');
    }
};
