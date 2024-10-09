<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Facilities;
                                                                                                                                            
class GalleryFrontendController extends Controller
{
    public function gallery(Request $request)
    {
        $names = Facilities::distinct('name')->pluck('name');
        $name = $request->input('name', 'all');

        if ($name === 'all') {
            $facilities = Facilities::all();
        } else {
            $facilities = Facilities::where('name', $name)->get();
        }


        return view('frontend.gallery', compact('facilities', 'names', 'name'));
    }
}
