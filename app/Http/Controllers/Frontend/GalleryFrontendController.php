<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Facilities;
use App\Models\HotelImages;
                                                                                                                                            
class GalleryFrontendController extends Controller
{
    // public function gallery1(Request $request)
    // {
    //     $names = Facilities::distinct('name')->pluck('name');
    //     // dd($names);
    //     $name = $request->input('name', 'all');

    //     if ($name === 'all') {
    //         $facilities = Facilities::all();
    //     } else {
    //         $facilities = Facilities::where('name', $name)->get();
    //     }


    //     return view('frontend.gallery', compact('facilities', 'names', 'name'));
    // }



    public function gallery(Request $request)
    {
        // $names = Facilities::distinct('name')->pluck('name');
        // $name = $request->input('name', 'all');
    
        // // Fetch all facilities with their images
        // $facilities = Facilities::select('id', 'name', 'image')
        //     ->when($name !== 'all', function ($query) use ($name) {
        //         return $query->where('name', $name);
        //     })
        //     ->get()
        //     ->map(function ($facility) {
        //         $facility->images = array_map('trim', explode(',', $facility->image));
        //         return $facility;
        //     });
    
        // // Group facilities by name
        // $groupedFacilities = $facilities->groupBy('name');

        $facilities = Facilities::all();
        $hotelImages = HotelImages::all();
    
        return view('frontend.gallery', compact('facilities','hotelImages'));
    }
}
