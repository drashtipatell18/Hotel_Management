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
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->nullable(); // Make sure the type matches the users.id field
            $table->unsignedInteger('room_id')->nullable(); // Make sure the type matches the users.id field
            $table->unsignedInteger('booking_id')->nullable(); // Make sure the type matches the spas.id field
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('house_no');
            $table->string('buling_name');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('cardholder_name');
            $table->string('card_number');
            $table->string('expiry_date');
            $table->string('cvv');
            $table->string('total_price');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkouts');
    }
};
