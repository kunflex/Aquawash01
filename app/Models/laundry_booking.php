<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laundry_Booking extends Model
{
    use HasFactory;
    protected $table='laundry_bookings';
    protected $fillable=[
        'laundry_invoice',
        'pick_up',
        'pick_up_time',
        'customer_name',
        'customer_number',
        'itemSelect',
        'quantity',
        'others',
        'service',
        'emergency_person',
        'emergency_person_contact',
        'description',
        'payment',
        'status',
        'amount',
        'assigned_to',
    ];

    public function items()
    {
        return $this->hasMany(LaundryItem::class);
    }
}
