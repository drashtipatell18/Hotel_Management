<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Facilities;

class AboutUsController extends Controller
{
    public function aboutus()
    {
        $facilities = Facilities::take(3)->get();
        return view('frontend.about',compact('facilities'));
    }
}
 