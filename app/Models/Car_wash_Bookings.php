<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car_wash_Bookings extends Model
{
    use HasFactory;

    protected $table='car_wash_bookings';
    protected $fillable=[
        'car_invoice',
        'pick_up',
        'pick_up_time',
        'customer_name',
        'customer_number',
        'car_brand',
        'car_color',
        'car_number',
        'car_washing_point',
        'service',
        'contact_person_name',
        'contact_person_number',
        'description',
    ];
}
