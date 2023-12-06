<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaundryItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'laundry_booking_id',
        'itemSelect',
        'quantity',
    ];

    // Define the inverse relationship
    public function laundryBooking()
    {
        return $this->belongsTo(Laundry_Booking::class);
    }
}
