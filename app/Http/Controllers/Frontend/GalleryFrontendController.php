<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Facilities;

class GalleryFrontendController extends Controller
{

    public function gallery(Request $request)
    {
        $facilities = Facilities::all();
        return view('frontend.gallery', compact('facilities'));
    }
}
