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
        $fitnessFacilities = Facilities::where('name', 'Fitness Center')->get();
        $indoorPoolFacilities = Facilities::where('name', 'Indoor Pool')->get();
        // dd($fitnessFacilities)
        return view('frontend.about',compact('facilities','fitnessFacilities','indoorPoolFacilities'));
    }
}
 