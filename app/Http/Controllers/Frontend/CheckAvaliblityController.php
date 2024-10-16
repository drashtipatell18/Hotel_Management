<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use Carbon\Carbon;
use App\Models\RoomTypes;
use App\Models\SmokingPrefrence;
use App\Models\AdditionalPrefrence;
class CheckAvaliblityController extends Controller
{
    public function checkAvilabilty(Request $request)
    {
        $query = Room::query();

        if ($request->filled('from_date') && $request->filled('to_date')) {
            // Convert from d-m-Y to Y-m-d
            $fromDate = Carbon::createFromFormat('d-m-Y', $request->input('from_date'))->format('Y-m-d');
            $toDate = Carbon::createFromFormat('d-m-Y', $request->input('to_date'))->format('Y-m-d');

            // Update the query to use the converted dates
            $query->where('from_date', '>=', $fromDate)
                ->where('to_date', '<=', $toDate);
        }

        if ($request->filled('sort_by')) {
            if ($request->input('sort_by') === 'high_to_low') {
                // Sort by rent in descending order (high to low)
                $query->orderBy('rent', 'desc');
            } elseif ($request->input('sort_by') === 'low_to_high') {
                // Sort by rent in ascending order (low to high)
                $query->orderBy('rent', 'asc');
            }
        }

        $availableRooms = $query->get();
        $roomCount = Room::count();
        $maxMemberCapacity = Room::max('total_member_capacity');
        $roomTypes = RoomTypes::all();
        $smokingPrefrences = SmokingPrefrence::all();
        $additionalPrefrence = AdditionalPrefrence::all();
       


        return view('frontend.check_avilabilty', compact('availableRooms','roomCount','maxMemberCapacity','roomTypes','smokingPrefrences','additionalPrefrence'));
    }



}
