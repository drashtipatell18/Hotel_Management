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
        $fromDate = null; // Initialize the variable for check-in date
        $toDate = null;   // Initialize the variable for check-out date

        // Check if both from_date and to_date are provided in the request
        if ($request->filled('from_date') && $request->filled('to_date')) {
            // Convert input dates to the correct format (Y-m-d)
            $fromDate = Carbon::createFromFormat('d-m-Y', $request->input('from_date'))->format('Y-m-d');
            $toDate = Carbon::createFromFormat('d-m-Y', $request->input('to_date'))->format('Y-m-d');

            // Fetch booked room IDs based on the date range
            $bookedRoomIds = Room::where(function($query) use ($fromDate, $toDate) {
                $query->where('from_date', '<=', $toDate)
                      ->where('to_date', '>=', $fromDate);
            })
            ->pluck('id')->flatten(); // Ensure it's a flat array of IDs
            // Debugging: Log the booked room IDs
            \Log::info('Booked Room IDs: ' . json_encode($bookedRoomIds));

            // Fetch booked rooms based on the same date range
            $bookedRooms = Room::whereIn('id', $bookedRoomIds)->get();
            \Log::info('Booked Rooms: ' . json_encode($bookedRooms));

            // Exclude booked rooms from the available rooms query
            $query->whereNotIn('id', $bookedRooms->pluck('id'));
        }

        // Sorting logic based on user input
        if ($request->filled('sort_by')) {
            if ($request->input('sort_by') === 'high_to_low') {
                $query->orderBy('rent', 'desc');
            } elseif ($request->input('sort_by') === 'low_to_high') {
                $query->orderBy('rent', 'asc');
            }
        }

        // Fetch available rooms with their images
        $availableRooms = $query->with('images')->get(); // Call with() before get()

        \Log::info('Available Room IDs: ' . json_encode($availableRooms->pluck('id')));
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
