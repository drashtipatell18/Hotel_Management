<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\RoomImages;
use App\Models\Amenities;
use Illuminate\Support\Facades\Auth;

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
        $roomCount = Room::count();
        $maxMemberCapacity = Room::max('total_member_capacity');

        $bedType = $room->bed_type;
       
        $similarRooms = Room::where('bed_type', $bedType)->get();
       

        $roomImages = $room->images;
        return view('frontend.booknow', compact('room', 'roomImages','amenities','roomCount','maxMemberCapacity','similarRooms'));
    }
    public function booknowStore(Request $request)
    {
       
       
        $users = Auth::user();
        
 
        $book = new Booking();
        $book->customer_id = $users->id;
        $book->room_id = $request->room_id;
        $book->check_in_date = $request->check_in_date;
        $book->check_out_date = $request->check_out_date;
     
        $book->room_count = $request->input('roomCount');
        $book->member_count = $request->input('member_count');
    
        $book->save();
        return redirect()->back()->with('success', 'Booking created successfully');
    }

    
}
