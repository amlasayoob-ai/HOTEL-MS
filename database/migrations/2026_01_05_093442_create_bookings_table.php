<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('reservation_id');

            $table->float('balance_amount');
            $table->float('extra_charges');
            $table->time('booking_time');
            $table->date('booking_date');
            $table->float('total_amount');
            $table->timestamps();


            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
