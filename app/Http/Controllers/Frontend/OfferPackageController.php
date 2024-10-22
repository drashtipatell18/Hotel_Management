<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\OfferPackage;
use Illuminate\Http\Request;
use App\Models\Room;

class OfferPackageController extends Controller
{
    public function offerPackage($id)
    {
        $offerPackage = OfferPackage::findOrFail($id);
       
        $query = Room::query();
        $availableRooms = Room::with(['images', 'offer']) // Assuming you have defined a relationship called `offer`
        ->whereNotNull('offer_id')
        ->get();

        $availableRoomsWithDiscounts = $availableRooms->filter(function($room) {
            return $room->offer && $room->offer->discount_value > 0; // Adjust 'discount_value' according to your Offer model
        });

        return view('frontend.Offer_Package',compact('availableRooms','availableRoomsWithDiscounts','offerPackage'));
    }
    
}
