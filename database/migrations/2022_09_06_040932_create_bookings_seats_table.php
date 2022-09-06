<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings_seats', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('booking_id');
            $table->foreign('booking_id')
            ->references('bookings')
            ->on('id')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->unsignedBigInteger('seat_id');
            $table->foreign('seat_id')
            ->references('seats')
            ->on('id')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->tinyInteger('state');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings_seats');
    }
};
