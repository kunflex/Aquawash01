<?php

namespace App\Http\Controllers;
use App\Models\Car_wash_Bookings;
use App\Models\All_Wash_points;
use Illuminate\Http\Request;

class CarwashController extends Controller
{
    //
    public function car_wash_overview(){
        $car_wash_point = All_Wash_points::where('category', 'car')->count();
        return view('admin.car_wash_overview',compact('car_wash_point'));
    }

    public function add_car_wash_booking(){
        return view('admin.add_car_wash_booking');
    }

    public function car_wash_bookings(){
        $query = Car_wash_Bookings::all();
        if(!$query->isEmpty()){
            return view('admin.car_wash_bookings', compact('query'));
            }
            else{
                $query ='no entries found!';
                return view('admin.car_wash_bookings', compact('query'));
            }
    }
}
