<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;

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

        $user->name = $request->name;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->dob = $request->dob;
        // dd($user->dob);
       
    
        // Handle image upload if provided
        if ($request->hasFile('profile')) 
        {
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
        }
        $user->save(); 

        $customer = Customer::where('user_id', $user->id)->first();
           

        if ($customer) {
            $customer->name = $user->name;
            $customer->lname = $user->lname;
            $customer->email = $user->email;
            $customer->ph_number = $user->phone_number;
            $customer->date = $user->dob;
    
            // Only update the fileupload field if a new file was uploaded
            if ($request->hasFile('profile')) {
                $customer->fileupload = $user->profile; // Use the updated profile filename
            }
    
            $customer->save(); // Save the customer data
        }
        
        return redirect()->route('myProfile')->with('success', 'Profile updated successfully!');
    }
    
    
}
