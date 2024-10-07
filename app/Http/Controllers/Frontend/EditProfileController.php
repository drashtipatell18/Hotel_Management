<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditProfileController extends Controller
{
    public function myprofile()
    {
        $user = Auth::user();
        // dd($user);
        return view("frontend.myProfile",compact("user"));
    }
    public function editProfile()
    {
        $user = Auth::user();
        return view('frontend.editProfile',compact('user'));
    }
    public function updateProfileData(Request $request)
    {
        $user = Auth::user();
    
        // Validate the incoming request data
       
    
        // Update the user's information
        $user->name = $request->name;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->dob = $request->dob;
        // $user->nationality = $request->nationality;
        // $user->state = $request->state;
        // $user->city = $request->city;
    
        // Handle image upload if provided
        if ($request->hasFile('profile')) {
            if ($user->profile) {
                $oldPath = public_path('assets/img/' . $user->profile);
                if (file_exists($oldPath)) {
                    unlink($oldPath); // Delete the old profile picture
                }
            }
            $destinationPath = public_path('assets/img');
            $file = $request->file('profile');
            $filename = time() . '_' . $file->getClientOriginalName(); 
            $file->move($destinationPath, $filename);

    
            $user->profile = $filename; 
            $user->save();
        }
    
        $user->save(); // Save the user
    
        return redirect()->route('myProfile')->with('success', 'Profile updated successfully!');
    }
    
    
}
