<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarwashController extends Controller
{
    //
    public function car_wash_overview(){
        return view('admin.car_wash_overview');
    }

    public function car_wash_point(){
        return view('admin.car_wash_point');
    }

    public function add_car_wash_booking(){
        return view('admin.add_car_wash_booking');
    }

    public function car_wash_bookings(){
        
    return view('admin.car_wash_bookings');
    }
}
