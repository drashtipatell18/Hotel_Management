<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use Carbon\Carbon;
use App\Models\RoomTypes;
use App\Models\SmokingPrefrence;
use App\Models\AdditionalPrefrence;
use App\Models\OfferPackage;
class CheckAvaliblityController extends Controller
{
    public function checkAvilabilty(Request $request)
    {
        $query = Room::query();

        if ($request->filled('from_date') && $request->filled('to_date')) {
            $fromDate = Carbon::createFromFormat('d-m-Y', $request->input('from_date'))->format('Y-m-d');
            $toDate = Carbon::createFromFormat('d-m-Y', $request->input('to_date'))->format('Y-m-d');
            $query->where('from_date', '>=', $fromDate)
                ->where('to_date', '<=', $toDate);
        }

        if ($request->filled('sort_by')) {
            if ($request->input('sort_by') === 'high_to_low') {
                $query->orderBy('rent', 'desc');
            } elseif ($request->input('sort_by') === 'low_to_high') {
                $query->orderBy('rent', 'asc');
            }
        }

        $availableRooms = Room::with('images')->get();
        $roomCount = Room::count();
        $maxMemberCapacity = Room::max('total_member_capacity');
        $roomTypes = RoomTypes::all();
        $smokingPrefrences = SmokingPrefrence::all();
        $additionalPrefrence = AdditionalPrefrence::all();

      

        $availableRoomsWithDiscounts = $availableRooms->filter(function($room) {
            return $room->offer && $room->offer->discount_value > 0; // Adjust 'discount_value' according to your Offer model
        });

     
       
        return view('frontend.check_avilabilty', compact('availableRooms','roomCount','maxMemberCapacity','roomTypes','smokingPrefrences','additionalPrefrence','availableRoomsWithDiscounts'));
    }



}
