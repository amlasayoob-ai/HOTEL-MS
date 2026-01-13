<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('booking_id');

            $table->float('Amount');
            $table->string('Payment_method');
            $table->date('Payment_date');
            $table->string('Payment_status');
            $table->timestamps();


            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
