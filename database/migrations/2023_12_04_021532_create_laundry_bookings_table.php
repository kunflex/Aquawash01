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
        Schema::create('laundry_price', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->string('items');
            $table->string('price');
            $table->timestamps();
        });

        Schema::create('laundry_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('laundry_invoice')->nullable();
            $table->string('pick_up')->nullable();
            $table->string('pick_up_time')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('customer_number')->nullable();
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

        Schema::create('laundry_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('laundry_booking_id');
            $table->unsignedBigInteger('itemSelect');
            $table->string('quantity');
            $table->timestamps();
        
            // Set a default value for 'laundry_booking_id' if not provided
            $table->foreign('laundry_booking_id')
                ->references('id')
                ->on('laundry_bookings')
                ->onDelete('cascade');
               

            // Set a foreign key constraint for 'itemSelect_id'
            $table->foreign('itemSelect') // Use 'itemSelect_id' instead of 'itemSelect'
            ->references('id')
            ->on('laundry_price')
            ->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laundry_price');
        Schema::dropIfExists('laundry_items');
        Schema::dropIfExists('laundry_bookings');
    }
};

