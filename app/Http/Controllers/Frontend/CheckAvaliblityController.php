<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use Carbon\Carbon;
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

        $availableRooms = $query->get();

        return view('frontend.check_avilabilty', compact('availableRooms'));
    }



}
