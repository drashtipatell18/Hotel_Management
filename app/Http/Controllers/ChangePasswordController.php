<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
    public function changePassword()
    {
        return view('auth.passwords.changepassword');
    }

    public function changePasswordStore(Request $request)
    {
        $messages = [
            'password.required' => 'The password field is required.',
            'password.string' => 'The password must be a string.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.confirmed' => 'The password confirmation does not match.',
            'password.regex' => 'The password must contain at least one lowercase letter, one uppercase letter, one digit, and one special character.',
            'password_confirmation.required' => 'The password confirmation field is required.',
            'password_confirmation.same' => 'The password confirmation must match the password.',
        ];
        
        $validatedData = $request->validate([
            'old_password' => 'required|max:255',
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/',
            ],
            'password_confirmation' => 'required|same:password',
        ], $messages);
        
        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            Toastr::error('Old password does not match', 'Error');
            return back();
        }

        $user->password = Hash::make($request->password);
        $user->save();

        Toastr::success('Password changed successfully', 'Success');
        return redirect()->route('home');
    }
}
