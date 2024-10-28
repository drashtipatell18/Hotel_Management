<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\Customer;
use Illuminate\Support\Str;



class GoogleLoginController extends Controller
{
    public function GoogleLogin()
    {
        return Socialite::driver("google")->redirect();
    }

    // public function GoogleAuthentication()
    // {
    //     try{
    //         $googleUser = Socialite::driver("google")->user();

    //         $user = User::where("google_id", $googleUser->id)->first();
    
    //         if ($user) {
    //             Auth::login($user);
    //             return redirect()->route("index");
    //         }
    //         else{
    //             $userData = User::create([
    //                 "name"=> $googleUser->name,
    //                 "email"=> $googleUser->email,
    //                 "password"=> Hash::make($googleUser->password),
    //                 "google_id"=> $googleUser->id,
    //             ]);
    
    //             if($userData){
    //                 Auth::login($userData);

    //                 Customer::create([
    //                     "user_id" => $userData->id,
    //                     // add any additional fields that are required in `customers` table
    //                 ]);
                    
    //                 return redirect()->route("index");
    //             }
    //         }
    //     }
    //     catch(Exception $e){
    //         dd($e);
    //     }
       

    //     // dd($googleUser);
    // }


    public function googleAuthentication()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            DB::beginTransaction();
            
            try {
                // Check if user exists
                $user = User::where('google_id', $googleUser->id)
                          ->orWhere('email', $googleUser->email)
                          ->first();

                if (!$user) {
                    // Create new user if doesn't exist
                    $user = User::create([
                        'name' => $googleUser->name,
                        'email' => $googleUser->email,
                        'password' => Hash::make(Str::random(16)),
                        'google_id' => $googleUser->id,
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
                    // Update existing user's Google ID if not set
                    if (empty($user->google_id)) {
                        $user->update([
                            'google_id' => $googleUser->id,
                            'email_verified_at' => now(),
                        ]);
                    }

                    // Update the existing customer record
                    $customer = Customer::where('user_id', $user->id)->first();
                    
                    if ($customer) {
                        $customer->update([
                            'name' => $googleUser->name,
                            'email' => $googleUser->email,
                            'updated_at' => now(),
                        ]);
                    } else {
                        // Create customer record only if it doesn't exist
                        Customer::create([
                            'user_id' => $user->id,
                            'name' => $user->name,
                            'email' => $user->email,
                            'status' => 'active',
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }

                DB::commit();

                // Login the user
                Auth::login($user);

                return redirect()->route('index')
                    ->with('success', 'Successfully logged in with Google!');

            } catch (Exception $e) {
                DB::rollBack();
                throw $e;
            }
        } catch (Exception $e) {
            return redirect()->route('login')
                ->with('error', 'Google login failed. Please try again.');
        }
    }
}
