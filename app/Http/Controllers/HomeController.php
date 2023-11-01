<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
class HomeController extends Controller
{
    //
    public function HomeIndex(){
        if (Auth::user()->role_id == 1) {
            return view('admin.dashboard');
        } else {
            return view('dashboard');
        }
    }

    public function Account(){
        return view('admin.account_details');
    }

    public function reports(){
        return view('admin.reports');
    }

    public function manage_enquiries(){
        return view('admin.manage_enquiries');
    }
}

