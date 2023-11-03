<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laundry_price extends Model
{
    use HasFactory;
    protected $table= 'laundry_price';
    protected $fillable=[
        'quantity',
        'items',
        'price',
    ];
}
