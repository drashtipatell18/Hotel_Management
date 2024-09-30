<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpaBookController extends Controller
{
    public function spabook()
    {
        return view('frontend.spabook');
    }
    public function spabookKnow()
    {
        return view('frontend.spabooknow');
    }
    public function spacheckout()
    {
        return view('frontend.spacheckout');
    }
}
