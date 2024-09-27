<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyBookingController extends Controller
{
    public function mybooking()
    {
        return view('frontend.my_booking');
    }

    public function nobooking()
    {
        return view('frontend.no_booking');
    }
}
