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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('location');
            $table->string('service_type');
            $table->integer('number_of_cats');
            $table->string('breed')->nullable();
            $table->string('size')->nullable();
            $table->date('booking_date');
            $table->time('booking_time');
            $table->integer('nights');
            $table->text('comment')->nullable();
            $table->string('status')->default('Coming to Centre');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
