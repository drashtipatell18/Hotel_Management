<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\RoomImages;
class BookNowController extends Controller
{
    public function booknow($roomId)
    {
        $room = Room::find($roomId);

        if (!$room) {
            return redirect()->back()->with('error', 'Room not found.');
        }
    
        $roomImages = $room->images;
    
        return view('frontend.booknow', compact('room', 'roomImages'));
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
     
        dd($book);
        $book->save();
        return redirect()->back()->with('success', 'Booking created successfully');
    }
}
