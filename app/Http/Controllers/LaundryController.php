<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\laundry_price; 
use App\Models\laundry_booking;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\All_Wash_points;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

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

    public function laundry_price_form(Request $request){
        $request->validate([
            'quantity' => 'required|numeric',
            'item' => 'required|string',
            'unit_price' => 'required|numeric',
        ]);
        $cont= new laundry_price();
        $cont->quantity = $request->input('quantity');
        $cont->items = $request->input('item');
        $cont->price = $request->input('unit_price');
        $cont->save();
        Alert::success('Laundry Item','Laundry item and price added successfully');
        return redirect()->back();
    }

    public function showForm()
    {
        return view('form');
    }
    
    public function previewForm(Request $request)
    {
       
        $data = $request->all();

        // You can perform any additional processing or validation here

        return response()->json($data);
    }
    
    

    public function laundry_new_item(){
        return view('admin.laundry_price');
    }

    public function laundry_request_form(){
        $price = laundry_price::all();
        return view('admin.laundry_request_form', compact('price'));
    }

    public function searchId($id){
        $query = laundry_booking::find($id);
        return redirect('laundry_booking');
    }

    public function generatePdf($id){
        $query=laundry_booking::find($id);
        $pdf = Pdf::loadView('admin.invoice.laundry_receipt',compact('query'));
        $pdf->setPaper('a5', 'portrait');
        return $pdf->stream('aquaclean.pdf');
    }


    public function laundry_form(Request $request){
        $request->validate([
            'laundry_invoice' => 'required|unique:laundry_booking,laundry_invoice',
            'pick_up' => 'required|date',
            'pick_up_time' => 'required|date_format:H:i',
            'customer_name' => 'required|string',
            'customer_number' => 'required|string',
            'itemSelect' => 'required',
            'quantity' => 'required|numeric',
            'others' => 'required|string',
            'service' => 'required|string',
            'emergency_person' => 'required|string',
            'emergency_person_contact' => 'required|string',
            'description' => 'nullable|string',
            'payment' => 'required',
        ]);
        $laundry = new laundry_booking();
        $laundry->quantity = $request->input('quantity');
        $laundry->save();
        Alert::success('Laundry Booking','Laundry booked successfully');
        return redirect()->back();
    }

    
    public function Update_Laundry($id){
        $query=laundry_booking::find($id);
        $people=Employee::where('category', 'laundry')->get();
        return view('admin.forms.update_carwash', compact('query','people'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'assigned_to',
            'status' => 'required',
            'amount',
        ]);

        $car = laundry_booking::findOrFail($id);
        $car ->assigned_to = $request->input('assigned_to');
        $car ->status =$request->input('status');
        $car ->amount= $request->input('amount');
        $car->update();
        Alert::success('Laundry Booking','Laundry booking updated successfully');
        return redirect('laundry_booking')->with('success', 'Laundry details updated successfully');
    }
}
