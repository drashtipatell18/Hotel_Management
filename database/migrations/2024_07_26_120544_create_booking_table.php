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
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id');
            $table->bigInteger('room_type_id');
            $table->string('room_number')->nullable();
            $table->bigInteger('floor_id');
            $table->string('ac_non_ac')->nullable();
            $table->integer('bed_count')->nullable();
            $table->integer('rent')->nullable();
            $table->integer('total_numbers')->nullable();
            $table->string('booking_date')->nullable();
            $table->string('time')->nullable();
            $table->string('check_in_date')->nullable();
            $table->string('check_in_time')->nullable();
            $table->string('check_out_date')->nullable();
            $table->string('check_out_time')->nullable();
            $table->bigInteger('total_hours')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('phone_number')->nullable();
            $table->text('message')->nullable();
            $table->enum('status', ['confirmed', 'cancelled'])->default('confirmed');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
