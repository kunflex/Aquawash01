<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Enquiries;
use App\Models\Car_wash_Bookings;
use App\Models\All_Wash_points;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    //
    public function HomeIndex(){
        if (Auth::user()->role_id == 1) {
            $laundry_wash_point = All_Wash_points::where('category', 'laundry')->count();
            $Users = User::all()->count();
            return view('admin.dashboard', compact('laundry_wash_point','Users'));
        } else {
            return view('dashboard');
        }
    }

    public function Account(){
        $query = User::all();
        if(!$query->isEmpty()){
            return view('admin.account_details',compact('query'));
            }
            else{
                $query ='no entries found!';
                return view('admin.account_details',compact('query'));
            }
    }

    public function AccountList(){
        $search = $_GET['input-search'];
        $query = User::where('name','like','%'.$search.'%')->get();
        $query = User::where('email','like','%'.$search.'%')->get();
        if(!$query->isEmpty()){
            return view('admin.account_details',compact('query'));
        }
        else{
            $query = 'search "'.$search.'" not found!';
            return view('admin.account_details',compact('query'));
        }
        
    }


    public function CarwashBookingList(){
        $search = $_GET['input-search'];
        $query = Car_wash_Bookings::where('car_invoice','like','%'.$search.'%')->get();
        if(!$query->isEmpty()){
            return view('admin.car_wash_bookings', compact('query'));
        }
        else{
            $query = 'search "'.$search.'" not found!';
            return view('admin.car_wash_bookings', compact('query'));
        }
        
    }
    
    public function EnquiriesList(){
        $search = $_GET['input-search'];
        $query = Enquiries::where('ticket','like','%'.$search.'%')->with('name')->get();
        if(!$query->isEmpty()){
            return view('admin.manage_enquiries', compact('query'));
        }
        else{
            $query = 'search "'.$search.'" not found!';
            return view('admin.manage_enquiries', compact('query'));
        }
        
    }

    public function Wash_pointList(){
        $search = $_GET['input-search'];
        $query = All_Wash_points::where('name','like','%'.$search.'%')->get();
        $query = All_Wash_points::where('category','like','%'.$search.'%')->get();
        if(!$query->isEmpty()){
            return view('admin.wash_point', compact('query'));
        }
        else{
            $query = 'search "'.$search.'" not found!';
            return view('admin.wash_point', compact('query'));
        }
        
    }
    

    public function reports(){
        return view('admin.reports');
    }

    public function manage_enquiries(){
        $query = Enquiries::all();
        if(!$query->isEmpty()){
             return view('admin.manage_enquiries', compact('query'));
            }
            else{
                $query ='no entries found!';
                 return view('admin.manage_enquiries', compact('query'));
            }
       
    }

    public function Wash_point(){
        $query = All_Wash_points::all();
        if(!$query->isEmpty()){
        return view('admin.wash_point', compact('query'));
        }
        else{
            $query ='no entries found!';
            return view('admin.wash_point', compact('query'));
        }
    }

    public function location(){
        return view('admin.forms.wash_point_form');
    }

    public function add_location(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required',
            'category' => 'required',
            'contact' => 'required',
        ]);
        $new=new All_Wash_points();
        $new->name=$request->input('name');
        $new->address=$request->input('address');
        $new->category=$request->input('category');
        $new->contact=$request->input('contact');
        $new->save();
        Alert::success('Location','New location added successfully');
        return redirect('wash_point');
    }

    public function new_user(){
        return view('admin.forms.newUser');
    }

    public function create_new_user(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required',
            'phone' => 'required',
            'role_id' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
        $password=$request->input('password');
        $confirm_password=$request->input('confirm_password');
        if($password==$confirm_password){
            $new=new User();
            $new->name=$request->input('name');
            $new->email=$request->input('email');
            $new->phone=$request->input('phone');
            $new->role_id=$request->input('role_id');
            $new->password=bcrypt($password);
            $new->save();
            Alert::success('Registration','New user added successfully');
            return redirect('account_details');
        }
        else{
            Alert::error('Registration','Password does not match!');
            return redirect()-back();
        }
        
    }
}

