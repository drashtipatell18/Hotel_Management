<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\RoomTypes;
use Illuminate\Http\Request;
use App\Models\RoomTypeImage;

class RoomsFrontendController extends Controller
{
    public function rooms()
    {
        // $roomTypes = RoomTypes::all();
        $roomTypesRooms = RoomTypes::with('images')->get();
        return view('frontend.rooms',compact('roomTypesRooms'));
    }
}
