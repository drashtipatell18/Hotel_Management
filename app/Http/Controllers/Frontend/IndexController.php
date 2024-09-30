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

        return view('frontend.index',compact('amenities','facilities','roomTypes','premiumRoomsCount','deluxeSuitesCount','HoneymoonRoomsCount','standardSuitesCount'));
    }
    public function register()
    {
        // dd('isha');
        return view('frontend.layouts.header');
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
