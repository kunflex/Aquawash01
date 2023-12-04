<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use App\Models\Enquiries;
use App\Models\Car_wash_Bookings;
use App\Models\All_Wash_points;
use Illuminate\Support\Facades\Storage;
use App\Models\laundry_price;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    //
    public function HomeIndex(){
        if (Auth::user()->role_id == 1) {
            $laundry_wash_point = All_Wash_points::where('category', 'laundry')->count();
            $Users = User::all()->count();
            $price = laundry_price::all();
            return view('admin.dashboard', compact('laundry_wash_point','Users','price'));
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

    public function searchId2($id){
        $point=All_Wash_points::find($id);
        return view('admin.forms.wash_point');
    }
    public function deleteWashPoints($id){
        $wash = All_Wash_points::find($id);
        // Check if the Wash Point exists
       if ($wash) {
           // Delete the Wash Point
           $wash->delete();
           Alert::success('Delete Wash Point', 'Wash Point deleted successfully');
       } else {
           Alert::error('Wash Point Not Found', 'The Wash Point you are trying to delete does not exist.');
       }
       
       return redirect('wash_point');
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

    public function employee_list(){
        $query= Employee::all();
        return view('admin.manage_employee', compact('query'));
    }

    public function searchId($id){
        $content=User::find($id);
        return redirect('account_details');
    }

    public function UpdatePage($id){
        $query = User::find($id);
        return view('admin.forms.update_user', compact('query'));
    }

    public function updateUser(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required',
            'phone' => 'required',
            'role_id' => 'required',
            'password' => 'required',
        ]);
    
        $user = User::find($id);
    
        if(!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
    
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->role_id = $request->input('role_id');
        $user->password = bcrypt($request->input('password'));
        $user->update();
        Alert::success('Update Wash Point','updated Wash Point successfully');
        return redirect('account_details');
    }

    public function deleteUser($id){
        $user = User::find($id);
         // Check if the user exists
        if ($user) {
            // Delete the user
            $user->delete();

            // Display a success message using the Alert facade (assuming you have it set up)
            Alert::success('Delete Wash Point', 'Wash Point deleted successfully');
        } else {
            // Display an error message if the user is not found
            Alert::error('User Not Found', 'The user you are trying to delete does not exist.');
        }
        
        return redirect('account_details');
    }


    public function updateWashPoints(){
        return redirect('wash_point');
    }
    

    public function Employee(){
        $search = $_GET['input-search'];
        $query = Employee::where('name','like','%'.$search.'%')->get();
        $query = Employee::where('category','like','%'.$search.'%')->get();
        if(!$query->isEmpty()){
            return view('admin.manage_employee',compact('query'));
        }
        else{
            $query = 'search "'.$search.'" not found!';
            return view('admin.manage_employee',compact('query'));
        }
        
    }

    
    public function New_Employee(){
        $branch = All_Wash_points::all();
        return view('admin.forms.newEmployee', compact('branch'));
    }
    public function RegisterEmployees(Request $request){
        $request->validate([
            'profile',
            'name'=> 'required',
            'email'=> 'required',
            'phone'=> 'required',
            'gender'=> 'required',
            'category'=> 'required',
            'branch'=> 'required',
            'emergency_person'=> 'required',
            'emergency_person_contact'=> 'required',
        ]);
        $employee= new Employee();

        // Check if a new profile picture is uploaded
        if ($request->hasFile('profile')) {
            // Store the uploaded file and get the path
            $path = $request->file('profile')->store('profile_pictures', 'public');

            // Delete the old profile picture if exists
            if ( $employee->profile) {
                Storage::disk('public')->delete( $employee->profile);
            }

            // Update the user's profile column with the new path
             $employee->profile = $path;
        }
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->gender = $request->input('gender');
        $employee->category = $request->input('category');
        $employee->branch = $request->input('branch');
        $employee->emergency_person = $request->input('emergency_person');
        $employee->emergency_person_contact = $request->input('emergency_person_contact');
        $employee->save();
        Alert::success('Register New Employee', 'Employee added successfully!');
        return redirect()->back();
    }
}

