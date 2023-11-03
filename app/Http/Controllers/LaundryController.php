<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\laundry_price;
class LaundryController extends Controller
{
    //
    public function laundry_price(){
        $query = laundry_price::all();
        if(!$query->isEmpty()){
            return view('admin.laundry_price_list', compact('query'));
            }
            else{
                $query ='no entries found!';
                return view('admin.laundry_price_list', compact('query'));
            }
        
    }

    public function laundry_price_list(){
        $search = $_GET['input-search'];
        $query = laundry_price::where('items','like','%'.$search.'%')->get();
        if(!$query->isEmpty()){
            return view('admin.laundry_price_list', compact('query'));
        }
        else{
            $query = 'search "'.$search.'" not found!';
            return view('admin.laundry_price_list', compact('query'));
        }
        
    }

    public function laundry_request_form(){
        return view('admin.laundry_request_form');
    }

    public function laundry_new_item(){
        return view('admin.laundry_price');
    }
}
