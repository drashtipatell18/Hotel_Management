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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->unsignedBigInteger('position_id')->nullable();
            $table->string('salary');
            $table->date('birth_date');
            $table->date('hire_date');
            $table->string('gender');
            $table->string('aadharcard');
            $table->text('address');
            $table->string('profile_pic');
            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->foreign('hotel_id')->references('id')->on('hotel')->onDelete('set null');
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('set null');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
