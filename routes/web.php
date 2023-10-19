<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/laundry_price_list', function () {
    return view('admin.laundry_price_list');
});
Route::get('/account_details', function () {
    return view('admin.account_details');
});
Route::get('/laundry_request_form', function () {
    return view('admin.laundry_request_form');
});
Route::get('/car_wash_point', function () {
    return view('admin.car_wash_point');
});
Route::get('/add_car_wash_booking', function () {
    return view('admin.add_car_wash_booking');
});
Route::get('/car_wash_bookings', function () {
    return view('admin.car_wash_bookings');
});
Route::get('/manage_enquiries', function () {
    return view('admin.manage_enquiries');
});
Route::get('/reports', function () {
    return view('admin.reports');
});
Route::get('/car_wash_overview', function () {
    return view('admin.car_wash_overview');
});


Route::get('/dashboard', function () {
    if(Auth::user()->role_id == 1){
        return view('admin.dashboard');
    }
    else{
        return view('dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
