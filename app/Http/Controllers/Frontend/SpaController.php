<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Spa;

class SpaController extends Controller
{
    public function spa()
    {
        $spas = Spa::take(3)->get();
        $RoomBaths = Spa::all();
        return view('frontend.spa', compact('spas','RoomBaths'));
    }
}
