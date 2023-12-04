<?php

namespace App\Http\Controllers;
use App\Models\Car_wash_Bookings;
use App\Models\All_Wash_points;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class CarwashController extends Controller
{
    //
    public function car_wash_overview(){
        $car_wash_point = All_Wash_points::where('category', 'car')->count();
        return view('admin.car_wash_overview',compact('car_wash_point'));
    }

    public function add_car_wash_booking(){
        $wash = All_Wash_points::where('category', 'car')->get();
        return view('admin.add_car_wash_booking', compact('wash'));
    }

    public function searchId($id){
        $query = Car_wash_Bookings::find($id);
        return redirect('car_wash_bookings');
    }

    public function car_wash_bookings(){
        $query = Car_wash_Bookings::all();
        if(Auth::id()){
            $role_id=Auth::user()->role_id;
            if($role_id == 1){
                if(!$query->isEmpty()){
                    return view('admin.car_wash_bookings', compact('query'));
                    }
                    else{
                        $query ='no entries found!';
                        return view('admin.car_wash_bookings', compact('query'));
                    }
            }
            else{
                $query = car_wash_bookings::where('customer_name',Auth::user()->name)->get();
                if(!$query->isEmpty()){
                    return view('admin.car_wash_bookings', compact('query'));
                    }
                    else{
                        $query ='no entries found!';
                        return view('admin.car_wash_bookings', compact('query'));
                    }
            }
        }
        else{
            return redirect()->back();
        }
    }
    
    public function generatePdf($id){
        $query=Car_wash_Bookings::find($id);
        $pdf = Pdf::loadView('admin.invoice.carwash_receipt',compact('query'));
        $pdf->setPaper('a5', 'portrait');
        return $pdf->stream('aquaclean.pdf');
    }

    public function car_wash_store(Request $request){
        $request->validate([
            'car_invoice' => 'required|unique:car_wash_bookings,car_invoice',
            'pick_up' => 'required|date',
            'pick_up_time' => 'required|date_format:H:i',
            'customer_name' => 'required|string',
            'customer_number' => 'required|string',
            'car_brand' => 'required|string',
            'car_color' => 'required|string',
            'car_number' => 'required|string',
            'car_washing_point' => 'required|string',
            'service' => 'required|string',
            'contact_person_number' => 'required|string',
            'description' => 'nullable|string',
            'payment' => 'required',
        ]);
        $car = new Car_wash_Bookings();
        $car->car_invoice = $request->input('car_invoice');
        $car->pick_up = $request->input('pick_up');
        $car->pick_up_time = $request->input('pick_up_time');
        $car->customer_name = $request->input('customer_name');
        $car->customer_number = $request->input('customer_number');
        $car->car_brand = $request->input('car_brand');
        $car->car_color = $request->input('car_color');
        $car->car_number = $request->input('car_number');
        $car->car_washing_point = $request->input('car_washing_point');
        $car->service = $request->input('service');
        $car->contact_person_name = $request->input('contact_person_name');
        $car->contact_person_number = $request->input('contact_person_number');
        $car->description = $request->input('description');
        $car->payment = $request->input('payment');
        $car->save();

        Alert::success('Car Wash Booking','Car Wash booked successfully');
        return redirect('car_wash_bookings');
    }

    
    
    public function Update_Carwash($id){
        $query=Car_wash_Bookings::find($id);
        $people=Employee::where('category', 'car')->get();
        return view('admin.forms.update_carwash', compact('query','people'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'assigned_to',
            'status' => 'required',
            'amount',
        ]);

        $car = Car_wash_Bookings::findOrFail($id);
        $car ->assigned_to = $request->input('assigned_to');
        $car ->status =$request->input('status');
        $car ->amount= $request->input('amount');
        $car->update();
        Alert::success('Car Wash Booking','Car Wash booking updated successfully');
        return redirect('car_wash_bookings')->with('success', 'Car details updated successfully');
    }
    
}
