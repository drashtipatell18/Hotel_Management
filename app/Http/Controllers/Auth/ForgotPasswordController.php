<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Mail;
use Brian2694\Toastr\Facades\Toastr;

class ForgotPasswordController extends Controller
{
    public function showForgetPasswordForm()
    {
        return view('auth.password.forgetpassword');
    }

    public function sendResetPasswordEmailLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $email = $request->email;

        // Find the user by the provided email
        $user = User::where('email', $email)->first();

        // Check if the user exists
        if ($user) {
            // Generate a new remember token for the user 
            $user->remember_token = Str::random(40);
            $user->save();

            // Send the password reset email to the user
            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            // Redirect back with a success message
            return back()->with('success', 'Password reset link sent successfully.');
        } else {
            // Redirect back with an error message if the user was not found
            return back()->with('danger', 'User not found.');
        }
    }

}
