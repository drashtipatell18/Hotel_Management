<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OfferPackageController extends Controller
{
    public function offerPackage()
    {
        return view('frontend.Offer_Package');
    }
}
