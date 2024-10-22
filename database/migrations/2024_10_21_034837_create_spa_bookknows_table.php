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
        Schema::create('spa_bookknows', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('spa_id')->nullable(); // Make sure the type matches the spas.id field
            $table->string('checkin');
            $table->string('datetime');
            $table->string('technician');
            $table->string('person');
            $table->string('price');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('spa_id')->references('id')->on('spas')->onDelete('cascade'); // Add foreign key constraint
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spa_bookknows');
    }
};
