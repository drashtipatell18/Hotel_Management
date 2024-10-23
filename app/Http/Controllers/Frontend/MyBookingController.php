<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checkout;
class MyBookingController extends Controller
{
    public function mybooking()
    {
        $checkouts = Checkout::where('user_id', auth()->user()->id)
        ->with(['room', 'booking', 'room.images']) // Ensure roomimages are included through the room relationship
        ->get();
        // Check if the 'rooms_images' table has a 'checkout_id' column
        return view('frontend.my_booking', compact('checkouts'));
    }
    public function nobooking()
    {
        return view('frontend.no_booking');
    }
}
