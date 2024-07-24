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
            $table->integer('per_extra_bed_price')->nullable();
            $table->integer('extra_bed_quantity')->nullable();
            $table->string('amenities_id')->nullable();
            $table->integer('base_price');
            $table->integer('extra_bed_price')->nullable();
            $table->string('room_image')->nullable();
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
