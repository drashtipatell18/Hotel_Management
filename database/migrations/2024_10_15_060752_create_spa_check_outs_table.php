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
        Schema::create('spa_check_outs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->nullable(); // Make sure the type matches the users.id field
            $table->unsignedInteger('spa_id')->nullable(); // Make sure the type matches the spas.id field
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('additional_info');
            $table->string('cardholder_name');
            $table->string('card_number');
            $table->string('expiry_date');
            $table->string('cvv');
            $table->string('total_price');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spa_check_outs');
    }
};
