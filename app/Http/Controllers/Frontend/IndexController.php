<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Amenities;
use App\Models\Facilities;
use Illuminate\Support\Facades\Validator;
use App\Models\RoomTypes;
use App\Models\ClientReview;
use App\Models\Customer; 


class IndexController extends Controller
{
    public function index()
    {
        $amenities = Amenities::all();
        $facilities = Facilities::all();
        $roomTypes = RoomTypes::all();

        $premiumRoomsCount = RoomTypes::where('room_name', 'Premium Rooms')->count();
        $deluxeSuitesCount = RoomTypes::where('room_name', 'Deluxe Room')->count();
        $HoneymoonRoomsCount = RoomTypes::where('room_name', 'Honeymoon Suite Room')->count();
        $standardSuitesCount = RoomTypes::where('room_name', 'Standard double Room')->count();

        $clientReviews = ClientReview::all();

        return view('frontend.index',compact('amenities','facilities','roomTypes','premiumRoomsCount','deluxeSuitesCount','HoneymoonRoomsCount','standardSuitesCount','clientReviews'));
    }
    public function register()
    {
        // dd('isha');
        return view('frontend.layouts.header');
    }
    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::where('email', $request->email)->first();
        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        $user->password_reset_otp = $otp;
        $user->password_reset_otp_expires_at = now()->addMinutes(15);
        $user->save();

        try {
            Mail::to($user->email)->send(new PasswordResetOtpMail($otp));

            return response()->json([
                'success' => true,
                'message' => 'OTP has been sent to your email.'
            ]);
        } catch (\Exception $e) {
            \Log::error('Password reset OTP email error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while sending the OTP. Please try again later.'
            ], 500);
        }
    }

    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'otp' => 'required|string|size:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::where('email', $request->email)
                    ->where('password_reset_otp', $request->otp)
                    ->where('password_reset_otp_expires_at', '>', now())
                    ->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid or expired OTP.'
            ], 400);
        }

        // OTP is valid, allow password reset
        return response()->json([
            'success' => true,
            'message' => 'OTP verified successfully.'
        ]);
    }
    public function storeUser(Request $request)
    {
                // Validate input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'required|string|max:15',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $userroleid = 3;
        // Store the new user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make($request->password);
        $user->role_id = $userroleid;
        $user->save();

        $customer = new Customer();
        $customer->user_id = $user->id; // Store the user_id from the users table
        $customer->name = $user->name;
        $customer->email = $user->email;
        $customer->ph_number = $user->phone_number;
        $customer->save(); // Save the customer record

        return response()->json([
            'success' => true,
            'message' => 'Registration successful! Please log in.',
            'redirect' => route('index')
        ]);
    }

    public function login()
    {
        return view('frontend.layouts.header');
    }

    // Method to authenticate user
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

             // Check if the authenticated user has role_id 3
             if ($user->role_id !== 3) {
                Auth::logout();
                return response()->json([
                    'success' => false,
                    'errors' => ['role' => ['Access denied for this user role.']]
                ], 403);
            }

            return response()->json([
                'success' => true,
                'message' => 'Login successful!',
                'redirect' => route('index'),
                'user' => [
                    'name' => $user->name,
                    'email' => $user->email
                ]
            ]);
        } else {
            // Check if the email exists
            $user = \App\Models\User::where('email', $request->email)->first();

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'errors' => ['email' => ['No account found with this email.']]
                ], 422);
            } else {
                return response()->json([
                    'success' => false,
                    'errors' => ['password' => ['Incorrect password.']]
                ], 422);
            }
        }
    }

    public function logoutfrontend(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['success' => true, 'message' => 'You have been logged out successfully.']);

    }

}
