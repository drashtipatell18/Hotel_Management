<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactFrontendController extends Controller
{
    public function contactus()
    {
        return view('frontend.contact');
    }
}
