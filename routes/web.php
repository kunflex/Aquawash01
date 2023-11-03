<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaundryController;
use App\Http\Controllers\CarwashController;
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


// ========HomeController Routes=======
Route::get('/dashboard', [HomeController::class, 'HomeIndex'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/account_details', [HomeController::class, 'Account']);
Route::get('/search-box', [HomeController::class, 'AccountList']);
Route::get('/search-box1', [HomeController::class, 'CarwashBookingList']);
Route::get('/reports', [HomeController::class, 'reports']);
Route::get('/manage_enquiries',[HomeController::class, 'manage_enquiries']);
Route::get('/search-box2', [HomeController::class, 'EnquiriesList']);
Route::get('/wash_point', [HomeController::class, 'Wash_point']);
Route::get('/search-box4', [HomeController::class, 'Wash_pointList']);
Route::get('/location', [HomeController::class, 'location']);
Route::post('/add_location', [HomeController::class, 'add_location']);
Route::get('/new_user', [HomeController::class, 'new_user']);
Route::post('/create_new_user', [HomeController::class, 'create_new_user']);
// ========end HomeController Routes=======



// ========LaundryController Routes=======
Route::get('/laundry_price_list',[LaundryController::class, 'laundry_price']);
Route::get('/laundry_request_form',[LaundryController::class, 'laundry_request_form']);
Route::get('/search-box3',[LaundryController::class, 'laundry_price_list']);
Route::get('/laundry_new_item',[LaundryController::class, 'laundry_new_item']);

// ========end LaundryController Routes=======



// ========CarwashController Routes=======
Route::get('/add_car_wash_booking', [CarwashController::class, 'add_car_wash_booking']);
Route::get('/car_wash_bookings', [CarwashController::class, 'car_wash_bookings']);
Route::get('/car_wash_overview', [CarwashController::class, 'car_wash_overview']);

// ========end CarwashController Routes=======



// ========Profile Settings=======
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// ========end Profile Settings=======
require __DIR__.'/auth.php';
