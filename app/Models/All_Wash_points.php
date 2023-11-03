<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class All_Wash_points extends Model
{
    use HasFactory;
    protected $table='all_wash_points';
    protected $fillable=[
        'name',
        'address',
        'category',
        'contact',
    ];
}
