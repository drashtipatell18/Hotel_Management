<?php

use App\Http\Controllers\AmenitiesController;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomTypeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/** set side bar active dynamic */
function set_active($route) {
    if(is_array($route)) {
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active': '';
}

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware'=>'auth'],function()
{
    Route::get('home',function()
    {
        return view('home');
    });
    Route::get('home',function()
    {
        return view('home');
    });
});

Auth::routes();

// ----------------------------- main dashboard ------------------------------//
Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'index')->name('home');
    Route::get('/profile', 'profile')->name('profile');
});

// -----------------------------login----------------------------------------//
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate');
    Route::get('/logout', 'logout')->name('logout');
});

// ------------------------------ register ---------------------------------//
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'storeUser')->name('register');
});

// ----------------------------- forget password ----------------------------//
Route::controller(ForgotPasswordController::class)->group(function () {
    Route::get('forget-password', 'getEmail')->name('forget-password');
    Route::post('forget-password', 'postEmail')->name('forget-password');
});

// ----------------------------- reset password -----------------------------//
Route::controller(ResetPasswordController::class)->group(function () {
    Route::get('reset-password/{token}', 'getPassword');
    Route::post('reset-password', 'updatePassword');
});


// ----------------------------- booking -----------------------------//
Route::controller(BookingController::class)->group(function () {
    Route::get('form/allbooking', 'allbooking')->name('form/allbooking')->middleware('auth');
    Route::get('form/booking/edit/{bkg_id}', 'bookingEdit')->middleware('auth');
    Route::get('form/booking/add', 'bookingAdd')->middleware('auth')->name('form/booking/add');
    Route::post('form/booking/save', 'saveRecord')->middleware('auth')->name('form/booking/save');
    Route::post('form/booking/update', 'updateRecord')->middleware('auth')->name('form/booking/update');
    Route::post('form/booking/delete', 'deleteRecord')->middleware('auth')->name('form/booking/delete');
});

// ---------------------------- customers --------------------------//
Route::controller(CustomerController::class)->group(function () {
    Route::get('form/allcustomers/page', 'allCustomers')->middleware('auth')->name('form/allcustomers/page');
    Route::get('form/addcustomer/page', 'addCustomer')->middleware('auth')->name('form/addcustomer/page');
    Route::post('form/addcustomer/save', 'saveCustomer')->middleware('auth')->name('form/addcustomer/save');
    Route::get('form/customer/edit/{id}', 'updateCustomer')->middleware('auth');
    Route::post('form/customer/update/{id}', 'updateRecord')->name('form/customer/update');
    Route::post('form/customer/delete', 'deleteRecord')->middleware('auth')->name('form/customer/delete');
    Route::post('/update-customer-status',  'updateStatus')->name('update.customer.status');
    Route::post('/get-customer-details', [CustomerController::class, 'getCustomerDetails'])->name('get.customer.details');
});

// ----------------------------- rooms -----------------------------//
Route::controller(RoomsController::class)->group(function () {
    Route::get('form/allrooms/page', 'allrooms')->middleware('auth')->name('form/allrooms/page');
    Route::get('form/addroom/page', 'addRoom')->middleware('auth')->name('form/addroom/page');
    Route::get('form/room/edit/{id}', 'editRoom')->middleware('auth');
    Route::post('form/room/save', 'saveRecordRoom')->middleware('auth')->name('form/room/save');
    Route::post('form/room/update/{id}', 'updateRecord')->name('form/room/update');
    Route::post('/update-room-status',  'updateStatus')->name('update.room.status');
    Route::get('form/room/delete/{id}','deleteRecord')->name('form/room/delete');

});

// ----------------------- user management -------------------------//
Route::controller(UserManagementController::class)->group(function () {
    Route::get('users/list/page', 'userList')->middleware('auth')->name('users/list/page');
    Route::get('users/add/new', 'userAddNew')->middleware('auth')->name('users/add/new'); /** add new users */
    Route::get('users/add/edit/{user_id}', 'userView'); /** add new users */
    Route::post('users/update', 'userUpdate')->name('users/update'); /** update record */
    Route::get('users/delete/{id}', 'userDelete')->name('users/delete'); /** delere record */
    Route::get('get-users-data', 'getUsersData')->name('get-users-data'); /** get all data users */
});

// ----------------------------- employee -----------------------------//
Route::controller(EmployeeController::class)->group(function () {
    Route::get('form/emplyee/list', 'employeesList')->middleware('auth')->name('form/emplyee/list');
    Route::get('form/employee/add', 'employeesAdd')->middleware('auth')->name('form/employee/add');
    Route::get('form/leaves/page', 'leavesPage')->middleware('auth')->name('form/leaves/page');
});


// Hotel

Route::controller(HotelController::class)->group(function () {
    Route::get('hotel/add', 'hotelCreate')->name('hotel/add');
    Route::post('hotel/store', 'hotelStore')->name('hotel/store');
    Route::get('hotel/list', 'hotelList')->name('hotel/list');
    Route::get('hotel/edit/{id}', 'hotelEdit');
    Route::post('hotel/update/{id}', 'hotelUpdate')->name('hotel/update');
    Route::post('/update-hotel-status', [HotelController::class, 'updateStatus'])->name('update.hotel.status');
});

// Amenities

Route::controller(AmenitiesController::class)->group(function () {
    Route::get('amenities/add', 'amenitiesCreate')->name('amenities/add');
    Route::post('amenities/store', 'amenitiesStore')->name('amenities/store');
    Route::get('amenities/list', 'amenitiesList')->name('amenities/list');
    Route::get('amenities/edit/{id}', 'amenitiesEdit');
    Route::post('amenities/update/{id}', 'amenitiesUpdate')->name('amenities/update');
    Route::get('/amenities/delete/{id}','amenitiesDelete')->name('amenities.delete');

});

// Room Type

Route::controller(RoomTypeController::class)->group(function () {
    Route::get('roomtype/add', 'roomtypeCreate')->name('roomtype/add');
    Route::post('roomtype/store', 'roomtypeStore')->name('roomtype/store');
    Route::get('roomtype/list', 'roomtypeList')->name('roomtype/list');
    Route::get('roomtype/edit/{id}', 'roomtypeEdit');
    Route::post('roomtype/update/{id}', 'roomtypeUpdate')->name('roomtype/update');
    Route::get('/roomtype/delete/{id}','roomtypeDelete')->name('roomtype.delete');

});

// Floor

Route::controller(FloorController::class)->group(function () {
    Route::get('floor/add', 'floorCreate')->name('floor/add');
    Route::post('floor/store', 'floorStore')->name('floor/store');
    Route::get('floor/list', 'floorList')->name('floor/list');
    Route::get('floor/edit/{id}', 'floorEdit');
    Route::post('floor/update/{id}', 'floorUpdate')->name('floor/update');
    Route::get('/floor/delete/{id}','floorDelete')->name('floor.delete');

});

// Food

Route::controller(FoodController::class)->group(function () {
    Route::get('food/add', 'foodCreate')->name('food/add');
    Route::post('food/store', 'foodStore')->name('food/store');
    Route::get('food/list', 'foodList')->name('food/list');
    Route::get('food/edit/{id}', 'foodEdit');
    Route::post('food/update/{id}', 'foodUpdate')->name('food/update');
    Route::get('/food/delete/{id}','foodDelete')->name('food.delete');

});
