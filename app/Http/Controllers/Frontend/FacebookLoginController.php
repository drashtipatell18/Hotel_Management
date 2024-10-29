<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\Customer;
use Illuminate\Support\Str;

class FacebookLoginController extends Controller
{
    public function FacebookLogin()
    {
        return Socialite::driver("facebook")->redirect();
    }

    public function FacebookAuthentication()
    {
        // try{
        //     $facebookUser = Socialite::driver("facebook")->user();
            
        //     $finduser = User::where("facebook_id", $facebookUser->id)->first();
    
        //     if ($finduser) {
        //         Auth::login($finduser);
        //         return redirect()->route("index");
        //     }
        //     else{
        //         $userData = User::create([
        //             "name"=> $facebookUser->name,
        //             "email"=> $facebookUser->email,
        //             "password"=> Hash::make($facebookUser->password),
        //             "facebook_id"=> $facebookUser->id,
        //         ]);
    
        //         if($userData){
        //             Auth::login($userData);
        //             return redirect()->route("index");
        //         }
        //     }
        // }
        // catch(Exception $e){
        //     dd($e);
        // }
        
        

 try {
    $facebookUser = Socialite::driver('facebook')->user();

    DB::beginTransaction();

        try {
            // Check if user exists
            $user = User::where('facebook_id', $facebookUser->id)->first();
    
            if (!$user) {
                // Create new user if doesn't exist
                $user = User::create([
                    'name' => $facebookUser->name,
                    'email' => $facebookUser->email,
                    'password' => Hash::make(Str::random(16)),
                    'facebook_id' => $facebookUser->id,
                    'email_verified_at' => now(),
                    'role_id' => 3
                ]);
    
                // Create initial customer record only for new users
                Customer::create([
                    'user_id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'status' => 'active',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                // If the user exists, optionally update any relevant fields
                $user->update([
                    'name' => $facebookUser->name,
                    'email' => $facebookUser->email,
                ]);
            }
    
            DB::commit();
    
            // Log the user in
            Auth::login($user);
    
            return redirect()->route('index')
                ->with('success', 'Successfully logged in with Facebook!');
    
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    } catch (Exception $e) {
        return redirect()->route('login')
            ->with('error', 'Facebook login failed. Please try again.');
    }
    
    
    
    }
}
