<?php

namespace App\Http\Controllers;

use App\Models\Amenities;
use Illuminate\Http\Request;
use App\Models\RoomTypes;
use Brian2694\Toastr\Facades\Toastr;

class RoomTypeController extends Controller
{
    public function roomtypeCreate()
    {
        $roomtype = null;
        $amenities = Amenities::all();
        return view('room_types/add',compact('amenities','roomtype'));
    }
    public function roomtypeStore(Request $request)
    {
        $request->validate([
            'room_name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'extra_bed_quantity' => 'nullable|required_if:extra_bed,1|integer|min:0',
            'amenities_id' => 'required|exists:amenities,id',
            'base_price' => 'required|numeric|min:0',
            'extra_bed_price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        try{
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
            Toastr::success('Create new room type successfully :)','Success');
            return redirect()->route('roomtype/list');
        }
        catch(\Exception $e) {
            Toastr::error('Add Room fail :)','Error');
            return redirect()->back();
        }


    }
    public function roomtypeList()
    {
        $roomTypes = RoomTypes::all();
        return view('room_types/listroomtype',compact('roomTypes'));
    }
    public function roomtypeEdit($id)
    {
        $roomtype = RoomTypes::find($id);
        $amenities = Amenities::all();
        return view('room_types/add', compact('roomtype','amenities'));
    }
    public function roomtypeUpdate(Request $request, $id)
    {
        $request->validate([
            'room_name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'extra_bed_quantity' => 'nullable|required_if:extra_bed,1|integer|min:0',
            'amenities_id' => 'required|exists:amenities,id',
            'base_price' => 'required|numeric|min:0',
            'extra_bed_price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);
        $roomType = RoomTypes::findOrFail($id);
        try{
            $roomType->update([
                'room_name' => $request->input('room_name'),
                'capacity' => $request->input('capacity'),
                'extra_bed' => $request->has('extra_bed') ? 1 : 0,
                'per_extra_bed_price' => $request->input('per_extra_bed_price'),
                'extra_bed_quantity' => $request->input('extra_bed_quantity', 0),
                'amenities_id' => implode(",", $request->input('amenities_id')),
                'base_price' => $request->input('base_price'),
                'extra_bed_price' => $request->input('extra_bed_price'),
                'description' => $request->input('description'),
            ]);
            Toastr::success('Room type updated successfully :)','Success');
            return redirect()->route('roomtype/list');
        }
        catch(\Exception $e) {
            Toastr::error('Add Room Type fail :)','Error');
            return redirect()->back();
        }

    }
}
