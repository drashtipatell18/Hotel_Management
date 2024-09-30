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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'required|string|max:15',
        ]);
        
        $userroleid = 3;
        // Store the new user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make($request->password);
        $user->role_id = $userroleid;
        $user->save();
    
     return redirect()->route('index');
    }
    

    public function login()
    {
        return view('frontend.layouts.header');
    }

    // Method to authenticate user
    public function authenticate(Request $request)
    {
        // Validate input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to authenticate
        if (Auth::attempt($credentials)) {
            // Authentication passed, redirect to the desired page
            $request->session()->regenerate();
            return redirect()->route('index'); // or your desired route
        }

        // If authentication fails
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }
    
}
