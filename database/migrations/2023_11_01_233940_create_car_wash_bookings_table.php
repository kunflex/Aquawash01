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
        Schema::create('car_wash_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('car_invoice');
            $table->string('pick_up');
            $table->string('pick_up_time');
            $table->string('customer_name');
            $table->string('customer_number');
            $table->string('car_brand');
            $table->string('car_color');
            $table->string('car_number');
            $table->string('car_washing_point');
            $table->string('service');
            $table->string('contact_person_name');
            $table->string('contact_person_number');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_wash_bookings');
    }
};
