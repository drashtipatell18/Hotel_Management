<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Hash;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function register()
    {
        // $role = DB::table('role_type_users')->get();
        // return view('auth.register',compact('role'));
        return view('auth.register');
    }
    public function storeUser(Request $request)
    {
        // $request->validate([
        //     'name'         => 'required|string|max:255',
        //     'email'        => 'required|string|email|max:255|unique:users',
        //     'role_id'    => 'required|string|max:255',
        //     'phone_number' => 'required|string|max:255',
        //     'position'     => 'required|string|max:255',
        //     'department'   => 'required|string|max:255',
        //     'password'     => 'required|string|min:8|confirmed',
        //     'password_confirmation' => 'required',
        //     'profile'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);

        $dt       = Carbon::now();
        $join_date = $dt->toDayDateTimeString();

        $image = ''; // Set default profile image if none uploaded
        if ($request->hasFile('profile')) {
            $profile = $request->file('profile'); // Retrieve the uploaded file
            $image = time().'.'.$profile->getClientOriginalExtension(); // Create unique image name
            $profile->move(public_path('assets/img'), $image); // Move the file to the destination folder
        }


        $user = new User();
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->phone_number = $request->phone_number;
        $user->join_date    = $join_date;
        $user->role_id    = $request->role_id;
        $user->position     = $request->position;
        $user->department   = $request->department;
        $user->profile       = $image;
        $user->password     = Hash::make($request->password);

        
        $user->save();

        Toastr::success('Create new account successfully :)','Success');
        return redirect('login');
    }
}
