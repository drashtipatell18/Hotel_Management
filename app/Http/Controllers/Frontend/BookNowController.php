<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\RoomImages;
use App\Models\Amenities;
class BookNowController extends Controller
{
    public function booknow($roomId)
    {
        $room = Room::find($roomId);

        if (!$room) {
            return redirect()->back()->with('error', 'Room not found.');
        }
        $roomType = $room->roomType;
        $amenityIds = explode(',', $roomType->amenities_id);
        $amenities = Amenities::whereIn('id', $amenityIds)->get();
       

        $roomImages = $room->images;
        return view('frontend.booknow', compact('room', 'roomImages','amenities'));
    }
    public function booknowStore(Request $request)
    {
        // $request->validate([
        //     'check_in' => 'required',
        //     'check_out' => 'required',
        //     'adult' => 'required',
        //     'child' => 'required',
        // ]);
        $book = new Booking();
        $book->room_id = $request->room_id;
        $book->check_in_date = $request->check_in_date;
        $book->check_out_date = $request->check_out_date;
    
        $book->save();
        return redirect()->back()->with('success', 'Booking created successfully');
    }
}
