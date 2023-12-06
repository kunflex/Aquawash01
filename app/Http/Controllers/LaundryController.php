<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\laundry_price; 
use App\Models\Laundry_Booking;
use App\Models\LaundryItem;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\All_Wash_points;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        $query = Laundry_Booking::find($id);
        return redirect('Laundry_Booking');
    }

    public function generatePdf($id){
        $query=Laundry_Booking::find($id);
        $pdf = Pdf::loadView('admin.invoice.laundry_receipt',compact('query'));
        $pdf->setPaper('a5', 'portrait');
        return $pdf->stream('aquaclean.pdf');
    }

    public function laundrystore(Request $request)
    {
        try {
            $request->validate([
                'laundry_invoice' => 'required|unique:laundry_bookings,laundry_invoice',
                'pick_up' => 'required|date',
                'pick_up_time' => 'required|date_format:H:i',
                'customer_name' => 'required|string',
                'customer_number' => 'required|string',
                'others' => 'required|string',
                'service' => 'required|string',
                'emergency_person' => 'required|string',
                'emergency_person_contact' => 'required|string',
                'description' => 'nullable|string',
                'payment' => 'required',
    
                // Update validation rules for array input fields
                'itemSelect.*' => 'required',
                'quantity.*' => 'required|numeric',
            ]);
           
            $laundry = new Laundry_Booking();
            $laundry->laundry_invoice = $request->input('laundry_invoice');
            $laundry->pick_up = $request->input('pick_up');
            $laundry->pick_up_time = $request->input('pick_up_time');
            $laundry->customer_name = $request->input('customer_name');
            $laundry->customer_number = $request->input('customer_number');
            $laundry->others = $request->input('others');
            $laundry->service = $request->input('service');
            $laundry->emergency_person = $request->input('emergency_person');
            $laundry->emergency_person_contact = $request->input('emergency_person_contact');
            $laundry->description = $request->input('description');
            $laundry->payment = $request->input('payment');
            $laundry->save();

            // Get the last inserted ID from the laundry_bookings table
            $lastLaundryBookingId = Laundry_Booking::latest()->first()->id;

            // Handling multiple items
            $items = $request->input('itemSelect');
            $quantities = $request->input('quantity');

            // Ensure $items and $quantities are arrays
            if (!is_array($items) || !is_array($quantities)) {
                // Handle the error or return a response as needed
                return response()->json(['error' => 'Invalid input for items or quantities']);
            }

            // Check if the count of items and quantities is the same
            if (count($items) !== count($quantities)) {
                // Handle the error or return a response as needed
                return response()->json(['error' => 'Mismatch in the number of items and quantities']);
            }

            // Continue with the foreach loop
            foreach ($items as $key => $item) {
                // Access corresponding quantity using $quantities[$key]
                $quantity = $quantities[$key];

                // Your existing logic for saving items
                $laundry = new LaundryItem();
                $laundry->laundry_booking_id = $lastLaundryBookingId; // Set the foreign key
                $laundry->itemSelect = $item;
                $laundry->quantity = $quantity;
                $laundry->save();
            }

            
            
            // Logging the success message
            Log::info('Laundry request stored successfully.', [
                'laundry_invoice' => $request->input('laundry_invoice'),
                'pick_up' => $request->input('pick_up'),
                'customer_name' => $request->input('customer_name'),
                // Add more relevant data as needed
            ]);
            
            Alert::success('Laundry Booking', 'Laundry booked successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            // Log the exception details
            Log::error('Error storing laundry request: ' . $e->getMessage());
    
            // Handle the exception as needed (e.g., show an error message)
            Alert::error('Error', 'An error occurred while processing the request. Please try again.');
    
            // Redirect back to the form with old input
            return redirect()->back()->withInput();
        }
    }
    
    

    
    public function Update_Laundry($id){
        $query=Laundry_Booking::find($id);
        $people=Employee::where('category', 'laundry')->get();
        $data=LaundryItem::find($id);
        $fan=laundry_price::all();
        return view('admin.forms.update_laundry', compact('query','people','data','fan'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'assigned_to',
            'status' => 'required',
            'amount',
        ]);

        $car = Laundry_Booking::findOrFail($id);
        $car ->assigned_to = $request->input('assigned_to');
        $car ->status =$request->input('status');
        $car ->amount= $request->input('amount');
        $car->update();
        Alert::success('Laundry Booking','Laundry booking updated successfully');
        return redirect('Laundry_Booking')->with('success', 'Laundry details updated successfully');
    }

    public function LaundryBookList(){
        $query = Laundry_Booking::all();
        return view('admin.laundrybooklist', compact('query'));
    }
}
