<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FacebookLoginController extends Controller
{
    public function FacebookLogin()
    {
        return Socialite::driver("facebook")->redirect();
    }

    public function FacebookAuthentication()
    {
        // try{
            $googleUser = Socialite::driver("facebook")->user();
            dd($googleUser);

        //     $user = User::where("google_id", $googleUser->id)->first();
    
        //     if ($user) {
        //         Auth::login($user);
        //         return redirect()->route("index");
        //     }
        //     else{
        //         $userData = User::create([
        //             "name"=> $googleUser->name,
        //             "email"=> $googleUser->email,
        //             "password"=> Hash::make($googleUser->password),
        //             "google_id"=> $googleUser->id,
        //         ]);
    
        //         if($userData){
        //             Auth::login($userData);

        //             Customer::create([
        //                 "user_id" => $userData->id,
        //                 // add any additional fields that are required in `customers` table
        //             ]);
                    
        //             return redirect()->route("index");
        //         }
        //     }
        // }
        // catch(Exception $e){
        //     dd($e);
        // }
       

        // dd($googleUser);
    }
}
