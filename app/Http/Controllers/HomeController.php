<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Staff;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // home page
    public function index()
    {
        $allBookings = DB::table('booking')->get();
        $bookingCount = $allBookings->count();
        $availableRoomsCount = DB::table('rooms')->where('status', 'active')->count();

        return view('dashboard.home',compact('allBookings','bookingCount','availableRoomsCount'));
    }

    // profile
    public function profile()
    {
        $user = Auth::user();
        $staff = Staff::with('position')->where('id', $user->staff_id)->first();
       

       
       
        return view('profile',compact('staff'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        // Get the current authenticated user
        $user = Auth::user();

        // Validate input data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'dob' => 'required|date',
            'email' => 'required|email|unique:users,email,' . $user->id, // Email must be unique except for the current user
            'phone_number' => 'required|string|max:15',
        ]);

        // If validation fails, return with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update user details
        $user->name = $request->name;
        $user->lname = $request->lname;
        $user->dob = $request->dob;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->save();

        $staff = Staff::where('id', $user->staff_id)->first();
      

        if ($staff) {
            // Update staff details
            $staff->first_name =  $request->name;
            $staff->last_name =  $request->lname;
            $staff->email =  $request->email;
            $staff->birth_date =  $request->dob;
            $staff->phone = $request->phone_number;
            $staff->address = $request->address;
            $staff->country = $request->country;
            $staff->state = $request->state;
            $staff->city = $request->city;
            $staff->save();
        }


        // Redirect back to the profile page with success message
        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }


    public function updateProfilePic(Request $request)
    {
        // Validate the uploaded file


        // Get the authenticated user
        $user = Auth::user();

        // Handle the uploaded file
        if ($request->hasFile('profile')) {
            // Delete the old profile picture if it exists
            if ($user->profile) {
                $oldPath = public_path('assets/img/' . $user->profile);
                if (file_exists($oldPath)) {
                    unlink($oldPath); // Delete the old profile picture
                }
            }

            // Define the destination path
            $destinationPath = public_path('assets/img');

            // Move the uploaded file to the 'public/assets/img' directory
            $file = $request->file('profile');
            $filename = time() . '_' . $file->getClientOriginalName(); // Create a unique filename
            $file->move($destinationPath, $filename);

            // Update the user's profile picture path in the database
            $user->profile = $filename; // Store the filename directly
            $user->save();
        }

        return redirect()->back()->with('success', 'Profile picture updated successfully.');
    }



}
