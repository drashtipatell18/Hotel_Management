<?php

use App\Http\Controllers\AmenitiesController;
use App\Http\Controllers\Frontend\EditProfileController;
use App\Http\Controllers\Frontend\GalleryController;
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
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SpasController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\HallTypeController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\PriceManagerController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\AdditionalFilterController;
use App\Http\Controllers\FacilitiesController;
use App\Http\Controllers\ClientReviewController;
use App\Http\Controllers\OffersPackageController;
use App\Http\Controllers\HotelAmenitiesController;

use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\AboutUsController;
use App\Http\Controllers\Frontend\RoomsFrontendController;
use App\Http\Controllers\Frontend\SpaController;
use App\Http\Controllers\Frontend\GalleryFrontendController;

use App\Http\Controllers\Frontend\CheckAvaliblityController;
use App\Http\Controllers\Frontend\BookNowController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\MyBookingController;
use App\Http\Controllers\Frontend\OfferPackageController;
use App\Http\Controllers\Frontend\SpaBookController;
use App\Http\Controllers\Frontend\CaptchaController;

use App\Http\Controllers\LocationController;

// =========================================================== Backend Route ============================================================

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
    Route::put('/profile/update', 'update')->name('profile.update');
    Route::post('/profilepic',  'updateProfilePic')->name('profilepic.updates');
});

// -----------------------------login----------------------------------------//
Route::controller(LoginController::class)->group(function () {
    Route::get('/admin/login', 'login')->name('adminlogin');
    Route::post('/login', 'authenticate');
    Route::get('/logout', 'logout')->name('logout');
});

// ------------------------------ register ---------------------------------//
Route::controller(RegisterController::class)->group(function () {
    Route::get('/admin/register', 'register')->name('register');
    Route::post('/register', 'storeUser')->name('register');
});


// ----------------------------- forget password ----------------------------//
Route::controller(ForgotPasswordController::class)->group(function () {
    Route::get('forget/password', 'showForgetPasswordForm')->name('forget.password');
    Route::post('forget/password', 'sendResetPasswordEmailLink')->name('send.resetpassword.emaillink');
});

// ----------------------------- reset password -----------------------------//
Route::controller(ResetPasswordController::class)->group(function () {
    Route::get('reset/password/{token}', 'resetPassword')->name('reset.password');
    Route::post('reset/password/{token}', 'restePasswordStore')->name('reset.password.store');
});

// Change Password
Route::middleware(['auth'])->group(function () {
    Route::get('/change-password', [ChangePasswordController::class, 'changePassword'])->name('password.change');
    Route::post('/change-password/store', [ChangePasswordController::class, 'changePasswordStore'])->name('password.change.store');
});

// ----------------------------- booking -----------------------------//
Route::controller(BookingController::class)->group(function () {
    Route::get('form/allbooking', 'allbooking')->name('form/allbooking')->middleware('auth');
    Route::get('form/booking/edit/{id}', 'bookingEdit')->middleware('auth');
    Route::get('form/booking/add', 'bookingAdd')->middleware('auth')->name('form/booking/add');
    Route::post('form/booking/save', 'saveRecord')->middleware('auth')->name('form/booking/save');
    Route::post('form/booking/update/{id}', 'updateRecord')->middleware('auth')->name('form/booking/update');
    Route::get('/form/booking/delete/{id}','deleteRecord')->name('booking.delete');

    Route::get('/get-room-numbers/{roomTypeId}', 'getRoomNumbers');
    Route::get('/get-room-details/{roomId}', 'getRoomDetails');
    Route::get('/get-customer-details/{customerName}',  'getCustomerDetails');
    Route::post('/update-booking-status',  'updateStatus')->name('update.booking.status');



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
    Route::delete('/room/image/delete/{id}', [RoomsController::class, 'deleteImage'])->name('rooms.image.delete');

});

// ----------------------- user management -------------------------//
Route::controller(UserManagementController::class)->group(function () {
    Route::get('users/list/page', 'userList')->middleware('auth')->name('users/list/page');
    Route::get('users/add/new', 'userAddNew')->middleware('auth')->name('users/add/new'); /** add new users */
    Route::get('users/add/edit/{user_id}', 'userView'); /** add new users */
    Route::post('users/update/{id}', 'userUpdate')->name('users/update'); /** update record */
    Route::get('users/delete/{id}', 'userDelete')->name('users/delete'); /** delere record */
    Route::get('get-users-data', 'getUsersData')->name('get-users-data'); /** get all data users */
    Route::post('users/add', [UserManagementController::class, 'createUser'])->name('users.add');
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
    Route::post('/update-hotel-status','updateStatus')->name('update.hotel.status');
    Route::delete('/hotel/image/delete/{id}', [HotelController::class, 'deleteImage'])->name('hotel.image.delete');
});

// Room Amenities
Route::controller(AmenitiesController::class)->group(function () {
    Route::get('amenities/add', 'amenitiesCreate')->name('amenities/add');
    Route::post('amenities/store', 'amenitiesStore')->name('amenities/store');
    Route::get('amenities/list', 'amenitiesList')->name('amenities/list');
    Route::get('amenities/edit/{id}', 'amenitiesEdit');
    Route::post('amenities/update/{id}', 'amenitiesUpdate')->name('amenities/update');
    Route::get('/amenities/delete/{id}','amenitiesDelete')->name('amenities.delete');

});

// Hotel Amenities
Route::controller(HotelAmenitiesController::class)->group(function () {
    Route::get('amenities/hotel/add', 'amenitiesHotelCreate')->name('amenities/hotel/add');
    Route::post('amenities/hotel/store', 'amenitiesHotelStore')->name('amenities/hotel/store');
    Route::get('amenities/hotel/list', 'amenitiesHotelList')->name('amenities/hotel/list');
    Route::get('amenities/hotel/edit/{id}', 'amenitiesHotelEdit');
    Route::post('amenities/hotel/update/{id}', 'amenitiesHotelUpdate')->name('amenities/hotel/update');
    Route::get('/amenities/hotel/delete/{id}','amenitiesHotelDelete')->name('amenitiesHotel.delete');

});

// Room Type
Route::controller(RoomTypeController::class)->group(function () {
    Route::get('roomtype/add', 'roomtypeCreate')->name('roomtype.add');
    Route::post('roomtype/store', 'roomtypeStore')->name('roomtype/store');
    Route::get('roomtype/list', 'roomtypeList')->name('roomtype/list');
    Route::get('roomtype/edit/{id}', 'roomtypeEdit');
    Route::post('roomtype/update/{id}', 'roomtypeUpdate')->name('roomtype/update');
    Route::get('/roomtype/delete/{id}','roomtypeDelete')->name('roomtype.delete');
    Route::post('/update-roomtype-status',  'updateStatus')->name('update.roomtype.status');
    Route::get('daily-price/list', 'dailyPriceList')->name('daily-price.list');
    Route::delete('/roomtype/image/delete/{id}',  'deleteImage')->name('roomtype.image.delete');
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

// Positions
Route::controller(PositionController::class)->group(function () {
    Route::get('position/add', 'positionCreate')->name('position/add');
    Route::post('position/store', 'positionStore')->name('position/store');
    Route::get('position/list', 'positionList')->name('position/list');
    Route::get('position/edit/{id}', 'positionEdit');
    Route::post('position/update/{id}', 'positionUpdate')->name('position/update');
    Route::get('/position/delete/{id}','positionDelete')->name('position.delete');
});

// Staff
Route::controller(StaffController::class)->group(function () {
    Route::get('staff/add', 'staffCreate')->name('staff/add');
    Route::post('staff/store', 'staffStore')->name('staff/store');
    Route::get('staff/list', 'staffList')->name('staff/list');
    Route::get('staff/edit/{id}', 'staffEdit');
    Route::post('staff/update/{id}', 'staffUpdate')->name('staff/update');
    Route::get('/staff/delete/{id}','staffDelete')->name('staff.delete');
    Route::post('/update-staff-status',  'updateStatus')->name('update.staff.status');
});

// Price Manager
Route::controller(PriceManagerController::class)->group(function () {
    Route::get('pricemanager/add', 'priceManagerCreate')->name('pricemanager/add');
    Route::post('pricemanager/store', 'priceManagerStore')->name('pricemanager/store');
    Route::get('pricemanager/edit/{id}', 'pricemanagerEdit');
    Route::get('/pricemanager/delete/{id}','pricemanagerDelete')->name('pricemanager.delete');

});

// Event
Route::controller(EventController::class)->group(function () {
    Route::get('event/add', 'eventCreate')->name('event/add');
    Route::post('event/store', 'eventStore')->name('event/store');
    Route::get('event/list', 'eventList')->name('event/list');
    Route::get('event/edit/{id}', 'eventEdit');
    Route::post('event/update/{id}', 'eventUpdate')->name('event/update');
    Route::get('/event/delete/{id}','eventDelete')->name('event.delete');
});

// Hall Type
Route::controller(HallTypeController::class)->group(function () {
    Route::get('halltype/add', 'halltypeCreate')->name('halltype/add');
    Route::post('halltype/store', 'halltypeStore')->name('halltype/store');
    Route::get('halltype/list', 'halltypeList')->name('halltype/list');
    Route::get('halltype/edit/{id}', 'halltypeEdit');
    Route::post('halltype/update/{id}', 'halltypeUpdate')->name('halltype/update');
    Route::get('/halltype/delete/{id}','halltypeDelete')->name('halltype.delete');
    Route::post('/update-halltype-status',  'updateStatus')->name('update.halltype.status');
});

// Hall
Route::controller(HallController::class)->group(function () {
    Route::get('hall/add', 'hallCreate')->name('hall/add');
    Route::post('hall/store', 'hallStore')->name('hall/store');
    Route::get('hall/list', 'hallList')->name('hall/list');
    Route::get('hall/edit/{id}', 'hallEdit');
    Route::post('hall/update/{id}', 'hallUpdate')->name('hall/update');
    Route::get('/hall/delete/{id}','hallDelete')->name('hall.delete');
    Route::post('/update-hall-status',  'updateStatus')->name('update.hall.status');
});

// Contact
Route::controller(ContactController::class)->group(function () {
    Route::get('contact/list', 'ContactList')->name('contact/list');
    Route::get('/contact/delete/{id}','ContactDelete')->name('contact.delete');
});

// Filter
Route::controller(FilterController::class)->group(function () {
    Route::get('filter/smoking', 'smokingFileter')->name('filter/smoking');
    Route::post('filter/storeSmoking', 'storeSmoking')->name('filter/storeSmoking');
    Route::get('smoking/list', 'SmokingList')->name('smoking/list');
    Route::get('smoking/edit/{id}', 'smokingEdit');
    Route::post('smoking/update/{id}', 'smokingUpdate')->name('smoking/update');
    Route::get('/smoking/delete/{id}','smokingDelete')->name('smoking.delete');
    Route::delete('/smoking/image/delete/{id}', [FilterController::class, 'deleteImage'])->name('smoking.image.delete');
});

// Additional Prefrence
Route::controller(AdditionalFilterController::class)->group(function () {
    Route::get('additionalFilter', 'additionalFilter')->name('additional/filter');
    Route::post('additionalFilter/store', 'storeAdditionalFilter')->name('additionalFilter/store');
    Route::get('additionalFilter/list', 'additionalFilterLisnt')->name('additionalFilter/list');
    Route::get('additional/edit/{id}', 'additionalEdit');
    Route::post('additionalFilter/update/{id}', 'additionalUpdate')->name('additional/update');
    Route::get('/additional/delete/{id}','additionalDelete')->name('additional.delete');
    Route::delete('additional/image/delete/{id}', [AdditionalFilterController::class, 'deleteImage'])->name('additional.image.delete');
});


// Facilities
Route::controller(FacilitiesController::class)->group(function () {
    Route::get('facilities/add', 'facilitiesCreate')->name('facilities/add');
    Route::post('facilities/store', 'facilitiesStore')->name('facilities/store');
    Route::get('facilities/list', 'facilitiesList')->name('facilities/list');
    Route::get('facilities/edit/{id}', 'facilitiesEdit');
    Route::post('facilities/update/{id}', 'facilitiesUpdate')->name('facilities/update');
    Route::get('/facilities/delete/{id}','facilitiesDelete')->name('facilities.delete');
    Route::delete('/facilities/image/delete/{id}', [FacilitiesController::class, 'deleteImage'])->name('facilities.image.delete');

});

//Spa
Route::controller(SpasController::class)->group(function () {
    Route::get('spa/list', 'spaList')->name('spa/list');
    Route::get('spa/add', 'spaCreate')->name('spa/add');
    Route::post('spa/store', 'spaStore')->name('spa/store');
    Route::get('spa/edit/{id}', 'spaEdit');
    Route::post('spa/update/{id}', 'spaUpdate')->name('spa/update');
    Route::get('/spa/delete/{id}','spaDelete')->name('spa.delete');
    Route::delete('spa/image/delete/{id}',  'deleteImage')->name('spa/image/delete');
});

// offer & package
Route::controller(OffersPackageController::class)->group(function () {
    Route::get('offer/package/add', 'offerPackageCreate')->name('offer/package/add');
    Route::post('offer/package/store', 'offerPackageStore')->name('offer/package/store');
    Route::get('offer/package/list', 'offerPackageList')->name('offer/package/list');
    Route::get('offer/package/edit/{id}', 'offerPackageEdit')->name('offer/package/edit');
    Route::post('offer/package/update/{id}', 'offerPackageUpdate')->name('offer/package/update');
    Route::get('/offer/package/delete/{id}','offerPackageDelete')->name('offerPackage.delete');
    Route::delete('offer/image/delete/{id}',  'deleteImage')->name('offer/image/delete');
});

// Client Review
Route::controller(ClientReviewController::class)->group(function () {
    Route::get('clientReview/add', 'clientReviewCreate')->name('clientReview/add');
    Route::post('clientReview/store', 'clientReviewStore')->name('clientReview/store');
    Route::get('clientReview/list', 'clientReviewList')->name('clientReview/list');
    Route::get('clientReview/edit/{id}', 'clientReviewEdit');
    Route::post('clientReview/update/{id}', 'clientReviewUpdate')->name('clientReview/update');
    Route::get('/clientReview/delete/{id}','clientReviewDelete')->name('clientReview.delete');

});
Route::get('/location/create', [LocationController::class, 'create'])->name('location.create');
Route::post('/location/store', [LocationController::class, 'store'])->name('location.store');




// =========================================================== Frontend Route ============================================================
Route::get('/',[IndexController::class,'index'])->name('index');
Route::get('/aboutus',[AboutUsController::class,'aboutus'])->name('aboutus');
Route::get('/rooms',[RoomsFrontendController::class,'rooms'])->name('rooms-frontend');
Route::get('/spa',[SpaController::class,'spa'])->name('spa');
Route::get('/gallery',[GalleryFrontendController::class,'gallery'])->name('gallery');

Route::get('/contact-us',[ContactController::class,'contactus'])->name('contact-us');
Route::post('/contact-us/store',[ContactController::class,'contactusStore'])->name('contactStore');
Route::get('/check-avilabilty',[CheckAvaliblityController::class,'checkAvilabilty'])->name('check-avilabilty');
Route::get('/booknow/{roomId}', [BookNowController::class, 'booknow'])->name('booknow');
Route::get('/booknowroomtype/{roomId}', [BookNowController::class, 'booknowroomtype'])->name('booknowroomtype');



Route::post('/booknow/store',[BookNowController::class,'booknowStore'])->name('booknow.store');
Route::get('/checkout/{id}',[CheckoutController::class,'checkout'])->name('checkout');
Route::post('/checkout-store/{id}',[CheckoutController::class,'chckoutStore'])->name('chckout.store');
Route::get('/mybooking',[MyBookingController::class,'mybooking'])->name('mybooking');
Route::get('/edit-profile',[EditProfileController::class,'editProfile'])->name('editProfile');
Route::post('/updateprofiledata',[EditProfileController::class,'updateProfileData'])->name('updateprofiledata');

Route::get('/my-profile',[EditProfileController::class,'myProfile'])->name('myProfile');
Route::get('/no-booking',[MyBookingController::class,'nobooking'])->name('nobooking');
Route::get('/offer-package/{id}',[OfferPackageController::class,'offerPackage'])->name('offerPackage');

Route::get('/spabook',[SpaBookController::class,'spabook'])->name('spabook');
Route::get('/spabook-know/{id}',[SpaBookController::class,'spabookKnow'])->name('spabookKnow');
Route::post('/spabooknowstore/{id}',[SpaBookController::class,'spabooknowStore'])->name('spabooknowstore');
Route::get('/spacheckout/{id}',[SpaBookController::class,'spacheckout'])->name('spacheckout');
Route::post('/spacheckout-store/{id}',[SpaBookController::class,'spacheckoutStore'])->name('spacheckout.store');


Route::get('/register', [IndexController::class, 'register'])->name('register');
Route::post('/register', [IndexController::class, 'storeUser'])->name('register.store');
Route::get('/login', [IndexController::class, 'login'])->name('login');
Route::post('/logoutfrontend', [IndexController::class, 'logoutfrontend'])->name('logoutfrontend');
Route::post('/loginstore', [IndexController::class, 'authenticate'])->name('login.authenticate');
Route::post('/forget-password', [IndexController::class, 'forgotPassword'])->name('forget.password');
Route::post('/verify-otp', [IndexController::class, 'verifyOtp'])->name('verify.otp');
Route::post('/password/reset', [IndexController::class, 'resetPassword'])->name('password.reset');
Route::post('/resend-otp', [IndexController::class, 'resendOtp'])->name('resend.otp');
Route::get('/offer-details', [IndexController::class, 'offerDetails'])->name('offerDetails');

Route::get('reload-captcha', [CaptchaController::class, 'reloadCaptcha'])->name('reload.captcha');



Route::middleware(['auth.redirect'])->group(function () {
    Route::get('/my-profile',[EditProfileController::class,'myProfile'])->name('myProfile');

});
