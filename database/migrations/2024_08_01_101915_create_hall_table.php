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
        Schema::create('hall', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('floor_id')->nullable();
            $table->unsignedBigInteger('halltype_id')->nullable();
            $table->bigInteger('hall_number');
            $table->text('description');
            $table->enum('status', ['avaliable', 'notavaliable'])->default('avaliable');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('floor_id')->references('id')->on('floors')->onDelete('set null');
            $table->foreign('halltype_id')->references('id')->on('halltypes')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hall');
    }
};
