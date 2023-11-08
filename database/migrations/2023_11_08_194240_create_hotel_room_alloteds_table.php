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
        Schema::create('hotel_room_alloteds', function (Blueprint $table) {
            $table->id('s_no');
            $table->unsignedBigInteger('hotel_id');
            $table->foreign('hotel_id')->references('hotel_id')->on('hotel_masters');
            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id')->references('room_id')->on('room_masters');
            $table->integer('no_of_rooms');
            $table->integer('no_of_guests');
            $table->decimal('rate_per_night', 10, 2);
            $table->string('room_image', 20);
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_room_alloteds');
    }
};
