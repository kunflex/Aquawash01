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
Route::get('laundry-receipt', function () {
    return view('admin.invoice.laundry_receipt');
});
Route::get('carwash-receipt', function () {
    return view('carwash_receipt');
});

Route::get('/carwash/{id}', [CarwashController::class, 'searchId']);
Route::get('update_carwash/{id}', [CarwashController::class, 'Update_Carwash']);
Route::put('carupdate/{id}', [CarwashController::class, 'update']);

Route::get('new_employee', [HomeController::class, 'New_Employee']);

Route::get('/download-pdf/{id}', [CarwashController::class, 'generatePdf'])->name('downloadPdf');



Route::post('/laundry_form',[LaundryController::class, 'laundry_form']);

Route::get('/laundry/{id}', [LaundryController::class, 'searchId']);
Route::get('update_laundry/{id}', [LaundryController::class, 'Update_Laundry']);
Route::put('laundryupdate/{id}', [LaundryController::class, 'update']);

Route::get('/download-pdf/{id}', [LaundryController::class, 'generatePdf'])->name('downloadPdf');


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

Route::get('/search-box5', [HomeController::class, 'Employee']);
Route::get('/employee', [HomeController::class, 'employee_list']);
Route::post('/create_new_employee', [HomeController::class, 'RegisterEmployees']);

Route::get('/users/{id}', [HomeController::class, 'searchId']);
Route::post('/updateuser/{id}', [HomeController::class, 'updateUser']);
Route::get('/deleteusers/{id}', [HomeController::class, 'deleteUser']);
Route::get('update_user/{id}', [HomeController::class, 'UpdatePage']);

Route::get('/wash/{id}', [HomeController::class, 'searchId2']);
Route::get('/deletewashpoints/{id}', [HomeController::class, 'deleteWashPoints']);
Route::get('/updatewashpoints/{id}', [HomeController::class, 'updateWashPoints']);

// ========end HomeController Routes=======



// ========LaundryController Routes=======
Route::get('/laundry_request_form',[LaundryController::class, 'laundry_request_form']);

Route::get('/laundry_price_list',[LaundryController::class, 'laundry_price']);
Route::get('/search-box3',[LaundryController::class, 'laundry_price_list']);
Route::get('/laundry_new_item',[LaundryController::class, 'laundry_new_item']);
Route::post('/laundry_price_form',[LaundryController::class, 'laundry_price_form']);

Route::get('/form', [LaundryController::class, 'showForm']);
Route::post('/form', [LaundryController::class, 'submitForm'])->name('submitForm');

// ========end LaundryController Routes=======



// ========CarwashController Routes=======
Route::get('/add_car_wash_booking', [CarwashController::class, 'add_car_wash_booking']);
Route::get('/car_wash_bookings', [CarwashController::class, 'car_wash_bookings']);
Route::get('/car_wash_overview', [CarwashController::class, 'car_wash_overview']);
Route::post('/carwash_store', [CarwashController::class, 'car_wash_store']);
// ========end CarwashController Routes=======



// ========Profile Settings=======
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// ========end Profile Settings=======
require __DIR__.'/auth.php';
