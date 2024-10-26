<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GoogleLoginController extends Controller
{
    public function GoogleLogin()
    {
        return Socialite::driver("google")->redirect();
    }

    public function GoogleAuthentication()
    {
        try{
            $googleUser = Socialite::driver("google")->user();

            $user = User::where("google_id", $googleUser->id)->first();
    
            if ($user) {
                Auth::login($user);
                return redirect()->route("index");
            }
            else{
                $userData = User::create([
                    "name"=> $googleUser->name,
                    "email"=> $googleUser->email,
                    "password"=> Hash::make($googleUser->password),
                    "google_id"=> $googleUser->id,
                ]);
    
                if($userData){
                    Auth::login($userData);
                    return redirect()->route("index");
                }
            }
        }
        catch(Exception $e){
            dd($e);
        }
       

        // dd($googleUser);
    }
}
