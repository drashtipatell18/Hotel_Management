<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
   public function resetPassword($token)
    {
        $user = User::where('remember_token','=',$token)->first();
        if(!empty($user)){
            $data['user'] = $user;
            $data['token'] = $user->remember_token;
            return view('auth.password.reset_password', $data);
        }
    }

    public function restePasswordStore($token, Request $request)
    {
        $request->validate([
            'new_password' => 'required|string|min:8',
            'confirm_password' => 'required|string|min:8|same:new_password',
        ]);

        // Debugging - check values of the passwords
        // dd($request->all());
        
        if ($request->new_password !== $request->confirm_password) {
            return redirect()->back()->with('danger', 'The new password confirmation does not match.');
        }

        $user = User::where('remember_token', '=', $token)->first();
        if (!empty($user)) {
            if (empty($user->email_verified_at)) {
                $user->email_verified_at = now();
            }
            $user->remember_token = Str::random(40);
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect('admin/login')->with('success', 'Password successfully reset.');
        } else {
            return redirect()->back()->with('danger', 'Invalid token or user not found.');
        }
    }

}
