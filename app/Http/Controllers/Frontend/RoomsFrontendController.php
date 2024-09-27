<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomsFrontendController extends Controller
{
    public function rooms()
    {
        return view('frontend.rooms');
    }
}
