<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\RoomImages;
use App\Models\Amenities;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
        // dd($request->all());
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to login to proceed with the booking.');
        }

        $checkInDateTime = $request->input('check_in_datetime');
        $checkInDate = \Carbon\Carbon::parse($checkInDateTime)->toDateString(); // Get the date part
        $checkInTime = \Carbon\Carbon::parse($checkInDateTime)->toTimeString(); // Get the time part

        $checkOutDateTime = $request->input('check_out_datetime');
        $checkOutDate = \Carbon\Carbon::parse($checkOutDateTime)->toDateString(); // Get the date part
        $checkOutTime = \Carbon\Carbon::parse($checkOutDateTime)->toTimeString(); // Get the time part



        $users = Auth::user();
        $book = new Booking();
        $book->customer_id = $users->id;
        $book->room_id = $request->room_id;
        $book->check_in_date = $checkInDate;
        $book->check_in_time = $checkInTime;

        $book->check_out_date = $checkOutDate;
        $book->check_out_time = $checkOutTime;
        
        $book->room_type_id = $request->room_type_id;
        $book->room_number = $request->room_number;
        $book->floor_id = $request->floor_id;
        $book->ac_non_ac = $request->ac_non_ac;
        $book->booking_date = Carbon::now()->format('Y-m-d');
        $book->total_cost = $request->input('total_cost');

     
        $book->room_count = $request->input('room_count');
        $book->member_count = $request->input('member_count');
    
        $book->save();
        return redirect()->back()->with('success', 'Booking created successfully');
    }

    
}
