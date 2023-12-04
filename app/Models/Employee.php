<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table='employees';
    protected $fillables=[
           'name',
           'email',
           'profile',
           'phone',
           'gender',
           'category',
           'branch',
           'emergency_person',
           'emergency_person_contact',
    ];
}
