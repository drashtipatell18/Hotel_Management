<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckAvaliblityController extends Controller
{
    public function checkAvilabilty()
    {
        return view('frontend.check_avilabilty');
    }
}
