<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Booking;
use App\Models\Coupon;
use App\Models\CouponUsage;
use App\Models\Customer;

class CheckoutController extends Controller
{
    public function checkout($id)
    {
        $booking = Booking::with(['room', 'booking', 'room.images'])->findOrFail($id);
        // dd($booking);

        $user = auth()->user();
        $customerEdit = Customer::where('user_id', $user->id)->first();
        return view('frontend.checkout',compact('id','user','booking','customerEdit'));
    }
    public function chckoutStore(Request $request,$id)
    {
        $request->validate([
            // 'first_name' => 'required',
            // 'last_name' => 'required',
            // 'phone' => 'required',
            // 'dob' => 'required',
            // 'email' => 'required',
            'additional_info' => 'required',
            'house_no' => 'required',
            'buling_name' => 'required',
            // 'city' => 'required',
            // 'state' => 'required',
            // 'country' => 'required',
            'cardholder_name' => 'required',
            'card_number' => 'required',
            'expiry_date' => 'required',
            'cvv' => 'required',
            'captcha' => 'required|captcha'
        ]);

        $booking = Booking::find($id);

        $discount = floatval($booking->discount ?? 0);
        $finalPrice = floatval($booking->total_cost_input) - $discount;


        $checkout = Checkout::create([
            'user_id' => auth()->user()->id,
            'booking_id' => $booking->id,
            'room_id' => $booking->room_id,
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone' => $request->input('phone'),
            'dob' => $request->input('dob'),
            'email' => $request->input('email'),
            'house_no' => $request->input('house_no'),
            'buling_name' => $request->input('buling_name'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'country' => $request->input('country'),
            'cardholder_name' => $request->input('cardholder_name'),
            'card_number' => $request->input('card_number'),
            'expiry_date' => $request->input('expiry_date'),
            'cvv' => $request->input('cvv'),
            'total_price' => $finalPrice, // Use calculated final price
            'coupon_code' => $booking->coupon_code,
            'captcha' => $request->input('captcha'),
            'status' => 'pending',
        ]);
        session()->forget(['discount', 'discount_applied', 'discount_type', 'final_price']);

        return redirect()->route('mybooking')->with('success', 'Booking created successfully');
    }

    public function applyCoupon(Request $request, $id)
    {
        $request->validate([
            'coupon_code' => 'required|string',
        ]);

        $couponCode = $request->input('coupon_code');
        $booking = Booking::findOrFail($id);

        // Find the coupon
        $coupon = Coupon::where('code', $couponCode)->first();
        if (!$coupon) {
            return response()->json(['error' => 'Invalid coupon code.'], 400);
        }

        // Check if the user has already used this coupon
        $couponUsage = CouponUsage::where('coupon_id', $coupon->id)
                                ->where('user_id', auth()->user()->id)
                                ->first();

        if ($couponUsage) {
            return response()->json(['error' => 'You have already used this coupon.'], 400);
        }

        // Check if the coupon has reached its max uses
        if ($coupon->usages()->count() >= $coupon->max_uses) {
            return response()->json(['error' => 'This coupon has reached its maximum usage limit.'], 400);
        }

        // Apply discount logic here
        $discountAmount = $coupon->type === 'percentage'
            ? ($booking->total_cost_input * $coupon->discount_amount) / 100
            : $coupon->discount_amount;

        $totalPrice = $booking->total_cost_input - $discountAmount;

        // Update the booking with the new total price
        $booking->coupon_code = $couponCode;
        $booking->discount = $discountAmount;
        $booking->final_price = $totalPrice;
        $booking->save();

        // Log the coupon usage
        CouponUsage::create([
            'coupon_id' => $coupon->id,
            'user_id' => auth()->user()->id,
        ]);

        // Store discount in session
        session(['discount' => $coupon->discount_amount]); // Store discount in session
        session(['discount_applied' => $discountAmount]); // Store discount amount in session
        session(['discount_type' => $coupon->type]); // Store discount type in session
        session(['final_price' => $totalPrice]); // Store final price in session

        // Return JSON response for successful coupon application
        return response()->json([
            'success' => 'Coupon applied successfully.',
            'new_total_price' => $totalPrice,
            'discount' => $coupon->discount_amount,
            'discount_type' => $coupon->type,
            'discount_applied' => $discountAmount,
        ]);
    }
}
