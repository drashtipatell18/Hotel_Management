<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Spa;
class SpaBookController extends Controller
{
    public function spabook()
    {
        $spas = Spa::all();
        return view('frontend.spabook', compact('spas'));
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
