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
        Schema::create('hotel_masters', function (Blueprint $table) {
            $table->id('hotel_id');
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')->references('location_id')->on('location_masters');
            $table->string('name', 100)->unique();
            $table->string('image')->unique();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_masters');
    }
};
