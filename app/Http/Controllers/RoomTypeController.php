<?php

namespace App\Http\Controllers;

use App\Models\Amenities;
use Illuminate\Http\Request;
use App\Models\RoomTypes;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;

class RoomTypeController extends Controller
{
    public function roomtypeCreate()
    {
        $roomtype = null;
        $amenities = Amenities::all();
        return view('room_types/add_room_typs',compact('amenities','roomtype'));
    }
    public function roomtypeStore(Request $request)
    {
        $request->validate([
            'room_name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            // 'extra_bed' => 'required',
            // 'per_extra_bed_price' => 'required',
            // 'extra_bed_quantity' => 'required',
            'amenities_id' => 'required|array',
            'amenities_id.*' => 'exists:amenities,id',
            'base_price' => 'required|numeric|min:0',
            'room_image' => 'required',
            'description' => 'required|nullable|string',
        ]);

        try{

            $room_type= $request->room_image;
            $file_name = rand() . '.' .$room_type->getClientOriginalName();
            $room_type->move(public_path('/assets/upload/'), $file_name);

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
                'room_image' => $file_name,


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

        $amenities = Amenities::all();

        return view('room_types/listroomtype',compact('roomTypes','amenities'));
    }
    public function roomtypeEdit($id)
    {
        $roomtype = RoomTypes::find($id);
        $amenities = Amenities::all();
        return view('room_types/add_room_typs', compact('roomtype','amenities'));
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
             'room_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $roomType = RoomTypes::findOrFail($id);
        try{

            if ($request->hasFile('room_image')) {
                if (file_exists(public_path('/assets/upload/') . $roomType->room_image)) {
                    unlink(public_path('/assets/upload/') . $roomType->room_image);
                }
                $room_image = $request->file('room_image');
                $file_name = rand() . '.' . $room_image->getClientOriginalName();
                $room_image->move(public_path('/assets/upload/'), $file_name);
                $roomType->room_image = $file_name;
            }

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
                'room_image' => $roomType->room_image ?? $roomType->getOriginal('room_image')
            ]);
            Toastr::success('Room type updated successfully :)','Success');
            return redirect()->route('roomtype/list');
        }
        catch(\Exception $e) {
            Toastr::error('Add Room Type fail :)','Error');
            return redirect()->back();
        }

    }
    public function roomtypeDelete($id)
    {
        DB::beginTransaction();
        try {
            $roomType = RoomTypes::findOrFail($id);
            $roomType->delete();
            DB::commit();
            Toastr::success('RoomType deleted successfully :)', 'Success');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Failed to delete roomType :(', 'Error');
        }
        return redirect()->route('roomtype/list');
    }
    public function updateStatus(Request $request)
    {
        $roomType = RoomTypes::find($request->roomtype_id);
        $roomType->status = $request->status;
        $roomType->save();

        return response()->json(['status' => 'success', 'new_status' => $roomType->status]);
    }
}
