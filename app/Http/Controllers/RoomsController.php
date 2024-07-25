<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomTypes;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;

class RoomsController extends Controller
{
    public function allrooms()
    {
        $allRooms = Room::with('roomType','food','floor')->get();
        return view('room.allroom',compact('allRooms'));
    }


    public function addRoom(Request $request)
    {
        $room_types = RoomTypes::all();
        $user = DB::table('users')->get();
        $floors = DB::table('floors')->whereNull('deleted_at')->get();
        $foods = Food::all();
        return view('room.addroom',compact('user','room_types','floors','foods'));
    }
    public function editRoom($id)
    {
        $roomEdit = DB::table('rooms')->where('id',$id)->first();
        $room_types = RoomTypes::all();
        $user = DB::table('users')->get();
        $floors = DB::table('floors')->whereNull('deleted_at')->get();
        $foods = Food::all();

        return view('room.editroom',compact('user','room_types','roomEdit','floors','foods'));
    }

    public function saveRecordRoom(Request $request)
    {

        $request->validate([
            'floor_id' => 'required|integer',
            'room_number' => 'required|string|max:255',
            'room_type_id' => 'required|integer',
            'ac_non_ac' => 'required|string|max:255',
            'food_id' => 'required|integer',
            'bed_count' => 'required|integer',
            'rent' => 'required|numeric',
            'phone_number' => 'required|string|max:15',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'message' => 'required|nullable|string',
        ]);

        DB::beginTransaction();
        try {
            $photo = $request->file('image');
            $file_name = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('assets/upload/'), $file_name);

            $room = new Room;
            $room->floor_id = $request->floor_id;
            $room->room_number = $request->room_number;
            $room->room_type_id = $request->room_type_id;
            $room->ac_non_ac = $request->ac_non_ac;
            $room->food_id = $request->food_id;
            $room->bed_count = $request->bed_count;
            $room->rent = $request->rent;
            $room->phone_number = $request->phone_number;
            $room->image = $file_name;
            $room->message = $request->message;


            $room->save();

            DB::commit();
            Toastr::success('Create new room successfully :)', 'Success');
            return redirect()->route('form/allrooms/page');

        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Add Room fail :)', 'Error');
            return redirect()->back();
        }
    }

    public function updateRecord(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $room = Room::findOrFail($id);

            if ($request->hasFile('image')) {
                $photo = $request->file('image');
                $file_name = rand() . '.' . $photo->getClientOriginalName();
                $photo->move(public_path('/assets/upload/'), $file_name);
                $room->image = $file_name;
            }

            // Update other fields
            $room->floor_id = $request->input('floor_id');
            $room->room_number = $request->input('room_number');
            $room->room_type_id = $request->input('room_type_id');
            $room->ac_non_ac = $request->input('ac_non_ac');
            $room->food_id = $request->input('food_id');
            $room->bed_count = $request->input('bed_count');
            $room->rent = $request->input('rent');
            $room->phone_number = $request->input('phone_number');
            $room->message = $request->input('message');

            $room->save();
            DB::commit();

            Toastr::success('Room Updated successfully :)', 'Success');
            return redirect()->route('form/allrooms/page');
        } catch (\Exception $e) {
            DB::rollback();

            Toastr::error('Update Room failed :)', 'Error');
            return redirect()->back();
        }
    }


    public function updateStatus(Request $request)
    {
        $room = Room::find($request->room_id);
        $room->status = $request->status;
        $room->save();

        return response()->json(['status' => 'success', 'new_status' => $room->status]);
    }

    // delete record
    public function deleteRecord(Request $request)
    {
        try {
            Room::destroy($request->id);
            unlink('assets/upload/'.$request->image);
            Toastr::success('Room deleted successfully :)','Success');
            return redirect()->back();

        } catch(\Exception $e) {

            DB::rollback();
            Toastr::error('Room delete fail :)','Error');
            return redirect()->back();
        }
    }
    public function getRoomDetails(Request $request)
    {
        $roomId = $request->id;
        $room = Room::find($roomId);
        if ($room) {
            return response()->json(['status' => 'success', 'room' => $room]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Room not found']);
        }
    }
}
