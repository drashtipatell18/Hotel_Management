<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
    {
        return view('frontend.index');
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
