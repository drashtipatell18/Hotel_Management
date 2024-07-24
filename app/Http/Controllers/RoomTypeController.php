<?php

namespace App\Http\Controllers;

use App\Models\Amenities;
use Illuminate\Http\Request;
use App\Models\RoomTypes;

class RoomTypeController extends Controller
{
    public function roomtypeCreate()
    {
        $amenities = Amenities::all();
        return view('room_types/add',compact('amenities'));
    }
    public function roomtypeStore(Request $request)
    {
        // $request->validate([
        //     'room_name' => 'required|string|max:255',
        //     'capacity' => 'required|integer|min:1',
        //     'extra_bed' => 'nullable|boolean',
        //     'extra_bed_quantity' => 'nullable|required_if:extra_bed,1|integer|min:0',
        //     'amenities_id' => 'required|exists:amenities,id',
        //     'base_price' => 'required|numeric|min:0',
        //     'extra_bed_price' => 'required|numeric|min:0',
        //     'description' => 'nullable|string',
        // ]);

        RoomTypes::create([
            'room_name' => $request->input('room_name'),
            'capacity' => $request->input('capacity'),
            'extra_bed' => $request->has('extra_bed') ? 1 : 0,
            'per_extra_bed_price'=> $request->input('per_extra_bed_price'),
            'extra_bed_quantity' => $request->input('extra_bed_quantity', 0),
            'amenities_id' => implode(",", $request->input('amenities_id')),
            'base_price' => $request->input('base_price'),
            'extra_bed_price' => $request->input('extra_bed_price'),
            'description' => $request->input('description'),
        ]);

    }
    public function roomtypeList()
    {
        return view('room_types/listroomtype');
    }
}
