<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\SmokingPrefrence;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomTypes;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use App\Models\AdditionalPrefrence;
use App\Models\RoomImages;
use File;

class RoomsController extends Controller
{
    public function allrooms(Request $request)
    {
        $query = Room::with('roomType', 'food', 'floor');
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $fromDate = $request->input('from_date');
            $toDate = $request->input('to_date');

            $query->where('from_date', '>=', $fromDate)
                  ->where('to_date', '<=', $toDate);
        }

        $allRooms = $query->get();
        return view('room.allroom', compact('allRooms'));
    }
    

    public function addRoom(Request $request)
    {
        $room_types = RoomTypes::where('status', 'active')->get();
        $user = DB::table('users')->get();
        $floors = DB::table('floors')->whereNull('deleted_at')->get();
        $foods = Food::all();
        $smokingPrefrences = SmokingPrefrence::all();
        $additionalPrefrence = AdditionalPrefrence::all();

        return view('room.addroom',compact('user','room_types','floors','foods','smokingPrefrences','additionalPrefrence'));
    }
    public function editRoom($id)
    {
        $roomEdit = Room::with('images')->findOrFail($id);
        $room_types = RoomTypes::all();
        $user = DB::table('users')->get();
        $floors = DB::table('floors')->whereNull('deleted_at')->get();
        $foods = Food::all();
        $smokingPrefrences = SmokingPrefrence::all();
        $additionalPrefrence = AdditionalPrefrence::all();
        

        return view('room.editroom',compact('user','room_types','roomEdit','floors','foods','smokingPrefrences','additionalPrefrence'));
    }


    
    public function saveRecordRoom(Request $request)
    {
        // Validate the request
        $request->validate([
            'floor_id' => 'required|integer',
            'room_number' => 'required|integer',
            'room_type_id' => 'required|integer',
            'ac_non_ac' => 'required|string|max:255',
            'food_id' => 'required|integer',
            'bed_type' => 'required|string|max:255',
            'rent' => 'required|numeric',
            'phone_number' => 'required|digits:10',
            'room_size' => 'required|string|max:255',
            'from_date' => 'nullable|date',
            'to_date' => 'nullable|date',
            'total_member_capacity' => 'nullable|integer',
            'smoking_id' => 'nullable|integer',
            'view_id' => 'nullable|integer',
            'message' => 'nullable|string',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048' // Validate each image file
        ]);
    
        DB::beginTransaction(); // Begin the transaction
    
        try {
            // Save the room first
            $room = new Room;
            $room->floor_id = $request->floor_id;
            $room->room_number = $request->room_number;
            $room->room_name = $request->room_name;
            $room->room_type_id = $request->room_type_id;
            $room->ac_non_ac = $request->ac_non_ac;
            $room->food_id = $request->food_id;
            $room->bed_type = $request->bed_type;
            $room->rent = $request->rent;
            $room->phone_number = $request->phone_number;
            $room->room_size = $request->room_size;
            $room->from_date = $request->from_date;
            $room->to_date = $request->to_date;
            $room->total_member_capacity = $request->total_member_capacity;
            $room->smoking_id = $request->smoking_id;
            $room->view_id = $request->view_id;
            $room->message = $request->message;
    
            $room->save(); // Save the room to get the room ID
    
            // Check if images are uploaded
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('/assets/upload/'), $imageName);
    
                    // Store image in the RoomImages table
                    RoomImages::create([
                        'room_id' => $room->id, // Use the saved room's ID
                        'image' => $imageName,
                    ]);
                }
            }
    
            DB::commit(); // Commit the transaction
            Toastr::success('Create new room successfully :)', 'Success');
            return redirect()->route('form/allrooms/page');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction if something goes wrong
            Toastr::error('Failed to create room: ' . $e->getMessage(), 'Error');
            return back()->withInput();
        }
    }
    
    

    public function updateRecord(Request $request, $id)
    {
        $request->validate([
            'floor_id' => 'required|integer',
            'room_number' => 'required|integer',
            'room_type_id' => 'required|integer',
            'ac_non_ac' => 'required|string|max:255',
            'food_id' => 'required|integer',
            'bed_type' => 'required',
            'rent' => 'required|numeric',
            'phone_number' => 'required|digits:10',
            'image' => 'array', // Changed to array for multiple images
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate each image in the array
            'room_size' => 'required',
            'message' => 'nullable|string',
        ]);
    
        DB::beginTransaction();
        try {
            $room = Room::findOrFail($id);
    
            // Update other fields
            $room->floor_id = $request->input('floor_id');
            $room->room_number = $request->input('room_number');
            $room->room_name = $request->input('room_name');
            $room->room_type_id = $request->input('room_type_id');
            $room->ac_non_ac = $request->input('ac_non_ac');
            $room->food_id = $request->input('food_id');
            $room->bed_type = $request->input('bed_type');
            $room->rent = $request->input('rent');
            $room->phone_number = $request->input('phone_number');
            $room->room_size = $request->input('room_size');
            $room->from_date = $request->input('from_date');
            $room->to_date = $request->input('to_date');
            $room->total_member_capacity = $request->input('total_member_capacity');
            $room->smoking_id = $request->input('smoking_id');
            $room->view_id = $request->input('view_id');
            $room->message = $request->input('message');
    
            if ($request->hasFile('image')) {
                // Get existing image names for the room
                $existingImages = RoomImages::where('room_id', $room->id)->pluck('image')->toArray();
    
                foreach ($request->file('image') as $image) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('/assets/upload/'), $imageName);
    
                    // Only store the image if it doesn't already exist for the room
                    if (!in_array($imageName, $existingImages)) {
                        RoomImages::create([
                            'room_id' => $room->id, // Use the saved room's ID
                            'image' => $imageName,
                        ]);
                    }
                }
            }
    
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

    public function deleteRecord($id)
    {
        try {
            $room = Room::find($id);
            if ($room) {
                $room->delete();
                Toastr::success('Room deleted successfully :)', 'Success');
                return redirect()->route('form/allrooms/page');
            } else {
                Toastr::error('Room not found :)', 'Error');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            Toastr::error('Room deletion failed :)', 'Error');
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

    public function deleteImage($id)
    {
        $image = RoomImages::findOrFail($id);
        $imagePath = public_path('assets/upload/' . $image->image);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        // Delete the image record from the database
        $image->delete();

        return response()->json(['success' => true]);
    }

}
