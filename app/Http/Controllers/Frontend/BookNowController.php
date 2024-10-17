<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
class BookNowController extends Controller
{
    public function booknow($id)
    {
        $room = Room::find($id);
        return view('frontend.booknow', compact('room'));
    }
    public function booknowStore(Request $request)
    {
        $request->validate([
            'check_in' => 'required',
            'check_out' => 'required',
            'adult' => 'required',
            'child' => 'required',
        ]);
        $book = new Booking();
        $book->room_id = $request->room_id;
        $book->check_in = $request->check_in;
        $book->check_out = $request->check_out;
        $book->adult = $request->adult;
        $book->child = $request->child;
        $book->save();
        return redirect()->back()->with('success', 'Booking created successfully');
    }
}
