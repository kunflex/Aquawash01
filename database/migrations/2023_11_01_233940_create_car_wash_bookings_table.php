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
            $table->string('car_invoice')->nullable();
            $table->string('pick_up')->nullable();
            $table->string('pick_up_time')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('customer_number')->nullable();
            $table->string('car_brand')->nullable();
            $table->string('car_color')->nullable();
            $table->string('car_number')->nullable();
            $table->string('car_washing_point')->nullable();
            $table->string('service')->nullable();
            $table->string('contact_person_name')->nullable();
            $table->string('contact_person_number')->nullable();
            $table->string('description')->nullable();
            $table->string('payment')->nullable();
            $table->string('status')->nullable();
            $table->string('amount')->nullable();
            $table->string('assigned_to')->nullable();
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
