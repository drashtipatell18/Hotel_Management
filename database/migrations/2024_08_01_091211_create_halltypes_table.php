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
        Schema::create('halltypes', function (Blueprint $table) {
            $table->id();
            $table->string('halltype_name');
            $table->string('halltype_image');
            $table->string('halltype_capacity');
            $table->string('base_price');
            $table->text('description');
            $table->enum('status', ['avaliable', 'notavaliable'])->default('avaliable');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('halltypes');
    }
};
