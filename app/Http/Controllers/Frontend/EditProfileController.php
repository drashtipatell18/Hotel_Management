<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditProfileController extends Controller
{
    public function myprofile()
    {
        return view("frontend.myProfile");
    }
    public function editProfile()
    {
        return view('frontend.editProfile');
    }
    
}
