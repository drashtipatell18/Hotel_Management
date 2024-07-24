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
        Schema::create('room_types', function (Blueprint $table) {
            $table->id();
            $table->string('room_name')->nullable();
            $table->text('description');
            $table->integer('capacity');
            $table->integer('extra_bed')->default(0);
            $table->integer('per_extra_bed_price');
            $table->integer('extra_bed_quantity');
            $table->string('amenities_id');
            $table->integer('base_price');
            $table->integer('extra_bed_price');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_types');
    }
};