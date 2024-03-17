<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->foreignId('flight_id')
                ->constrained('flights')
                ->onDelete('cascade');
                
            $table->string('seat_number');
            
            // Status column with 'booked' as default
            $table->enum('status', ['booked', 'cancelled'])->default('booked');

            // Additional columns for booking details
            $table->string('full_name');
            $table->string('email');
            $table->string('phone_number')->nullable();
            $table->date('dob')->nullable();
            $table->string('nationality')->nullable();
            $table->text('billing_address')->nullable();
            $table->string('payment_method')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};

