<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('floor_id')->nullable();
            $table->string('room_number')->nullable();
            $table->unsignedBigInteger('room_type_id')->nullable();
            $table->string('ac_non_ac')->nullable();
            $table->unsignedBigInteger('food_id')->nullable();
            $table->string('bed_count')->nullable();
            $table->string('rent')->nullable();
            $table->bigInteger('phone_number')->nullable();
            $table->string('image')->nullable();
            $table->string('room_size')->nullable();
            $table->string('message')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('floor_id')->references('id')->on('floors')->onDelete('set null');
            $table->foreign('room_type_id')->references('id')->on('room_types')->onDelete('set null');
            $table->foreign('food_id')->references('id')->on('foods')->onDelete('set null');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
