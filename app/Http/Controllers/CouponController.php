<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Support\Facades\Log;
class CouponController extends Controller
{
    public function couponList()
    {
        $coupons = Coupon::with('user')->get();
        return view('frontend.coupon.view', compact('coupons'));
    }

    public function couponCreate()
    {
        return view('frontend.coupon.create');
    }

    public function couponStore(Request $request)
    {
        dd($request->all());
        $request->validate([
            'code' => 'required|unique:coupons,code',
            'name' => 'required',
            'description' => 'nullable',
            'type' => 'required|in:fixed,percentage',
            'discount_amount' => 'required|numeric|min:0',
            'max_uses' => 'required|integer|min:1',
            'starts_at' => 'nullable|date',
            'expires_at' => 'nullable|date|after:starts_at',
        ]);

        $fileName = null;
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('assets/coupons'), $fileName);
        }

        Coupon::create([
            'user_id' => auth()->user()->id,
            'code' => $request->input('code'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'type' => $request->input('type'),
            'discount_amount' => $request->input('discount_amount'),
            'max_uses' => $request->input('max_uses'),
            'starts_at' => $request->input('starts_at'),
            'expires_at' => $request->input('expires_at'),
            'image' => $fileName,
        ]);
        return redirect()->route('coupon/list')->with('success', 'Coupon created successfully');
    }

    public function couponEdit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('frontend.coupon.edit', compact('coupon'));
    }

    public function couponUpdate(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'code' => 'required|unique:coupons,code,' . $id,
            'name' => 'required',
            'description' => 'nullable',
            'type' => 'required|in:fixed,percentage',
            'discount_amount' => 'required|numeric|min:0',
            'max_uses' => 'required|integer|min:1',
            'starts_at' => 'nullable|date',
            'expires_at' => 'nullable|date|after:starts_at',
        ]);

        $coupon = Coupon::findOrFail($id);
        // dd($request->hasfile('image'));
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('assets/coupons'), $fileName);
            $coupon->image = $fileName;
        }
        $coupon->update([
            'code' => $request->input('code'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'type' => $request->input('type'),
            'discount_amount' => $request->input('discount_amount'),
            'max_uses' => $request->input('max_uses'),
            'starts_at' => $request->input('starts_at'),
            'expires_at' => $request->input('expires_at'),
        ]);

        return redirect()->route('coupon/list')->with('success', 'Coupon updated successfully');
    }

    public function couponDelete($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        return redirect()->route('coupon/list')->with('success', 'Coupon deleted successfully');
    }

    public function validateCoupon(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required',
        ]);

        // Normalize the coupon code
        $coupon_code = $request->input('coupon_code');

        // Check if the coupon exists in the database
        $coupon = Coupon::where('code', $coupon_code)->first();
        if ($coupon) {
            // Check expiration date
            if ($coupon->expires_at && $coupon->expires_at < now()) {
                return response()->json(['valid' => false, 'message' => 'Coupon has expired.']);
            }

            // Check usage limits
            if ($coupon->max_uses <= $coupon->usage_count) {
                return response()->json(['valid' => false, 'message' => 'Coupon usage limit exceeded.']);
            }

            // Log the coupon details for debugging
            Log::info('Coupon validated:', ['code' => $coupon->code, 'discount_amount' => $coupon->discount_amount]);

            return response()->json(['valid' => true, 'discount_amount' => $coupon->discount_amount]);
        }

        // Log invalid coupon attempt
        Log::warning('Invalid coupon attempt:', ['code' => $coupon_code]);

        return response()->json(['valid' => false, 'message' => 'Coupon not found.']); // Added message for clarity
    }
}
