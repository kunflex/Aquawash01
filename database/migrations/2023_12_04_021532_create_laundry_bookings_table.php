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
        Schema::create('laundry_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('laundry_invoice')->nullable();
            $table->string('pick_up')->nullable();
            $table->string('pick_up_time')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('customer_number')->nullable();
            $table->string('itemSelect')->nullable();
            $table->string('quantity')->nullable();
            $table->string('others')->nullable();
            $table->string('service')->nullable();
            $table->string('emergency_person')->nullable();
            $table->string('emergency_person_contact')->nullable();
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
        Schema::dropIfExists('laundry_bookings');
    }
};
