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
        $query = User::all();
        return view('admin.account_details',compact('query'));
    }

    public function AccountList(){
        $search = $_GET['input-search'];
        $query = User::where('name','like','%'.$search.'%')->get();
        if(!$query->isEmpty()){
            return view('admin.account_details',compact('query'));
        }
        else{
            $query = 'search not found!';
            return view('admin.account_details',compact('query'));
        }
        
    }
    
    

    public function reports(){
        return view('admin.reports');
    }

    public function manage_enquiries(){
        return view('admin.manage_enquiries');
    }
}

