<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookNowController extends Controller
{
    public function booknow()
    {
        return view('frontend.booknow');
    }
}
