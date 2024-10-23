<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Booking;
class CheckoutController extends Controller
{
    public function checkout($id)
    {
        return view('frontend.checkout',compact('id'));
    }
    public function chckoutStore(Request $request,$id)
    {
        // dd($request->all());
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'nationality' => 'required',
            'additional_info' => 'required',
            'house_no' => 'required',
            'buling_name' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'pincode' => 'required',
            'cardholder_name' => 'required',
            'card_number' => 'required',
            'expiry_date' => 'required',
            'cvv' => 'required',
        ]);
        $booking = Booking::find($id);
        $checkout = Checkout::create([
            'user_id' => auth()->user()->id,
            'booking_id' => $booking->id,
            'room_id' => $booking->room_id,
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'nationality' => $request->input('nationality'),
            'house_no' => $request->input('house_no'),
            'buling_name' => $request->input('buling_name'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'country' => $request->input('country'),
            'pincode' => $request->input('pincode'),
            'cardholder_name' => $request->input('cardholder_name'),
            'card_number' => $request->input('card_number'),
            'expiry_date' => $request->input('expiry_date'),
            'cvv' => $request->input('cvv'),
            'total_price' => $request->input('total_price'),
            'status' => 'pending',
        ]);
        // dd($checkout);

        return redirect()->route('mybooking')->with('success', 'Booking created successfully');
    }

}
