<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\OfferPackage;
use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\DB;  

class OfferPackageController extends Controller
{
    public function offerPackage($id)
    {
        $offerPackage = OfferPackage::findOrFail($id);
       
        // Get the room IDs associated with the specific offer package
        $roomIds = DB::table('rooms')
            ->join('offer_packages', 'rooms.offer_id', '=', 'offer_packages.id')
            ->where('offer_packages.id', $offerPackage->id) // Use the offer package ID
            ->select('rooms.id')
            ->pluck('id');
    
        // Use the room IDs to filter available rooms
        $availableRooms = Room::with(['images', 'offer']) // Assuming you have defined a relationship called `offer`
            ->whereIn('id', $roomIds) // Filter by the room IDs obtained from the query
            ->whereNotNull('offer_id')
            ->get();
    
        // Filter rooms with discounts
        $availableRoomsWithDiscounts = $availableRooms->filter(function($room) {
            return $room->offer && $room->offer->discount_value > 0; // Adjust 'discount_value' according to your Offer model
        });
    
        return view('frontend.Offer_Package', compact('availableRooms', 'availableRoomsWithDiscounts', 'offerPackage'));
    }
    
    
}
