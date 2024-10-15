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
        Schema::create('offer_packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('hotel_id')->nullable(); // Make sure the type matches the hotels.id field
            $table->string('title');
            $table->string('description');
            $table->string('image');
            $table->string('discount_type');
            $table->string('discount_value');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('is_active');
            $table->foreign('hotel_id')->references('id')->on('hotel')->onDelete('cascade'); // Add foreign key constraint
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offer_packages');
    }
};
