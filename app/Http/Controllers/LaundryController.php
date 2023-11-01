<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaundryController extends Controller
{
    //
    public function laundry_price_list(){
        return view('admin.laundry_price_list');
    }

    public function laundry_request_form(){
        return view('admin.laundry_request_form');
    }

    public function laundry_new_item(){
        return view('admin.laundry_price');
    }
}
