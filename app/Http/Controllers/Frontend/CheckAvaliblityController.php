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
        $fromDate = null; // Initialize the variable
        $toDate = null;   // Initialize the variable

        if ($request->filled('from_date') && $request->filled('to_date')) {
            // Convert input dates to the correct format
            $fromDate = Carbon::createFromFormat('d-m-Y', $request->input('from_date'))->format('Y-m-d');
            $toDate = Carbon::createFromFormat('d-m-Y', $request->input('to_date'))->format('Y-m-d');

            // Adjust the query to find available rooms based on the booking dates
            $query->where(function($query) use ($fromDate, $toDate) {
                // Rooms that are available if they start after the requested to_date
                $query->where('from_date', '>', $toDate)
                      // OR rooms that end before the requested from_date
                      ->orWhere('to_date', '<', $fromDate);
            });
        }

        // Fetch booked rooms based on the same date range
        if ($fromDate && $toDate) { // Ensure $fromDate and $toDate are defined
            $bookedRooms = Room::where(function($query) use ($fromDate, $toDate) {
                $query->whereBetween('from_date', [$fromDate, $toDate])
                      ->orWhereBetween('to_date', [$fromDate, $toDate]);
            })->pluck('id');
        } else {
            $bookedRooms = collect(); // Initialize as empty collection if dates are not set
        }

        // Exclude booked rooms from the available rooms query
        $query->whereNotIn('id', $bookedRooms);

        // Sorting logic
        if ($request->filled('sort_by')) {
            if ($request->input('sort_by') === 'high_to_low') {
                $query->orderBy('rent', 'desc');
            } elseif ($request->input('sort_by') === 'low_to_high') {
                $query->orderBy('rent', 'asc');
            }
        }

        // Fetch available rooms with their images
        $availableRooms = $query->with('images')->get();

        // Additional data for the view
        $roomCount = Room::count();
        $maxMemberCapacity = Room::max('total_member_capacity');
        $roomTypes = RoomTypes::all();
        $smokingPrefrences = SmokingPrefrence::all();
        $additionalPrefrence = AdditionalPrefrence::all();

        // Filter available rooms with discounts
        $availableRoomsWithDiscounts = $availableRooms->filter(function($room) {
            return $room->offer && $room->offer->discount_value > 0; // Adjust 'discount_value' according to your Offer model
        });

        // Return the view with the available rooms and other data
        return view('frontend.check_avilabilty', compact('availableRooms', 'roomCount', 'maxMemberCapacity', 'roomTypes', 'smokingPrefrences', 'additionalPrefrence', 'availableRoomsWithDiscounts'));
    }



}
