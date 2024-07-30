<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function allbooking()
    {
        $allBookings = Booking::with('roomType','food','floor')->get();
        return view('formbooking.allbooking',compact('allBookings'));
    }

    public function bookingAdd()
    {
        $data = DB::table('room_types')->where('status', 'active')->get();

        $user = DB::table('customers')->select('id','name','lname')->get();
        return view('formbooking.bookingadd',compact('data','user'));
    }
    public function getRoomNumbers($roomTypeId)
    {
        $roomNumbers = DB::table('rooms')
        ->where('room_type_id', $roomTypeId)
        ->where('status', 'active')
        ->pluck('room_number', 'id');

        return response()->json($roomNumbers);
    }

    public function getRoomDetails($roomId)
    {
        $room = DB::table('rooms')->find($roomId);
        if ($room) {
            return response()->json([
                'floor_id' => $room->floor_id,
                'floor_name' => DB::table('floors')->where('id', $room->floor_id)->value('floor_name'), // Assuming 'name' is the column for floor name
                'nonAc' => $room->ac_non_ac, // Assuming these columns exist
                'bed_count' => $room->bed_count,
                'rent' => $room->rent
            ]);
        } else {
            return response()->json(['error' => 'Room not found'], 404);
        }

    }

    public function getCustomerDetails($fullName)
    {
        $parts = explode(' ', $fullName, 2); // Splits into at most 2 parts
        if (count($parts) < 2) {
            return response()->json(['error' => 'Invalid customer name format'], 400);
        }

        $name = $parts[0];
        $lname = $parts[1];
        $customer = DB::table('customers')
                    ->where('name', $name)
                    ->where('lname', $lname)
                    ->first();

        if ($customer) {
            return response()->json([
                'email' => $customer->email,
                'phone_number' => $customer->ph_number,
            ]);
        } else {
            return response()->json(['error' => 'Customer not found'], 404);
        }
    }


    public function updateStatus(Request $request)
    {
        $booking = Booking::find($request->booking_id);
        $booking->status = $request->status;
        $booking->save();

        return response()->json(['status' => 'success', 'new_status' => $booking->status]);
    }

    public function bookingEdit($id)
    {
        $bookingEdit = DB::table('booking')->where('id',$id)->first();
        $users = DB::table('customers')->select('id', 'name', 'lname')->get();
        $roomTypes = DB::table('room_types')->get();
        $floors = DB::table('floors')->pluck('floor_name', 'id');
        $roomNumbers = DB::table('rooms')
        ->where('room_type_id', $bookingEdit->room_type_id)
        ->where('floor_id', $bookingEdit->floor_id)
        ->pluck('room_number', 'id');

        $selectedCustomer = $bookingEdit->customer_id;

        return view('formbooking.bookingedit', [
            'bookingEdit' => $bookingEdit,
            'users' => $users,
            'roomTypes' => $roomTypes,
            'roomNumbers' => $roomNumbers,
            'floors' => $floors,
            'selectedCustomer' => $selectedCustomer
        ]);

        // return view('formbooking.bookingedit',compact('bookingEdit','users','roomTypes','roomNumbers','floors','selectedCustomer' => $customer->id ?? null));
    }


    public function saveRecord(Request $request)
    {
        $rules = [
            'customer_id' => 'required',
            'room_type_id' => 'required|integer|exists:room_types,id',
            'room_number' => 'required',
            'floor_id' => 'required|integer|exists:floors,id',
            'total_numbers' => 'required|integer|min:1',
            'booking_date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'check_in_date' => 'required|date|',
            'check_in_time' => 'required',
            'check_out_date' => 'required|date',
            'check_out_time' => 'required',
            'message' => 'nullable|string|max:500',
        ];

        $validatedData = $request->validate($rules);

        try{
                $roomNumber = DB::table('rooms')->where('id', $request->room_number)->value('room_number');
                if ($roomNumber === null) {
                    return response()->json(['error' => 'Room number not found'], 404);
                }
                $booking = new Booking();
                $booking->customer_id = $request->customer_id;
                $booking->room_type_id = $request->room_type_id;
                $booking->room_number = $roomNumber;
                $booking->floor_id = $request->floor_id;
                $booking->ac_non_ac = $request->ac_non_ac;
                $booking->bed_count = $request->bed_count;
                $booking->rent = $request->rent;
                $booking->total_numbers = $request->total_numbers;
                $booking->booking_date = $request->booking_date;
                $booking->time = $request->time;
                $booking->check_in_date = $request->check_in_date;
                $booking->check_in_time = $request->check_in_time;
                $booking->check_out_date = $request->check_out_date;
                $booking->check_out_time = $request->check_out_time;
                $booking->email = $request->email;
                $booking->phone_number = $request->phone_number;
                $booking->message = $request->message;
                $booking->total_hours = $request->total_hours;

                $booking->save();
                Toastr::success('Bookeng created successfully :)', 'Success');
                return redirect()->route('form/allbooking');
            }

        catch(\Exception $e) {
            Toastr::error('Add Booking fail :)','Error');
            return redirect()->back();
        }

    }


    // update record
    public function updateRecord(Request $request,$id)
    {
        $rules = [
            'customer_id' => 'required',
            'room_type_id' => 'required|integer|exists:room_types,id',
            'room_number' => 'required',
            'floor_id' => 'required|integer|exists:floors,id',
            'total_numbers' => 'required|integer|min:1',
            'booking_date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'check_in_date' => 'required|date|',
            'check_in_time' => 'required',
            'check_out_date' => 'required|date',
            'check_out_time' => 'required',
            'message' => 'nullable|string|max:500',
        ];
        $validatedData = $request->validate($rules);

        DB::beginTransaction();
        try {
            // Find the existing booking by ID
            $booking = Booking::findOrFail($id);

            // Update booking fields
            $booking->customer_id = $request->customer_id;
            $booking->room_type_id = $request->room_type_id;
            $booking->room_number = $request->room_number;
            $booking->floor_id = $request->floor_id;
            $booking->ac_non_ac = $request->ac_non_ac;
            $booking->bed_count = $request->bed_count;
            $booking->rent = $request->rent;
            $booking->total_numbers = $request->total_numbers;
            $booking->booking_date = $request->booking_date;
            $booking->time = $request->time;
            $booking->check_in_date = $request->check_in_date;
            $booking->check_in_time = $request->check_in_time;
            $booking->check_out_date = $request->check_out_date;
            $booking->check_out_time = $request->check_out_time;
            $booking->email = $request->email;
            $booking->phone_number = $request->phone_number;
            $booking->message = $request->message;
            $booking->total_hours = $request->total_hours;

            $booking->save();
            DB::commit();
            Toastr::success('Booking updated successfully :)', 'Success');
            return redirect()->route('form/allbooking');

        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Failed to update booking :)', 'Error');
            return redirect()->back();
        }
    }

    // delete record booking
    public function deleteRecord($id)
    {
        DB::beginTransaction();
        try {
            $booking = Booking::findOrFail($id);
            $booking->delete();
            DB::commit();
            Toastr::success('Booking deleted successfully :)', 'Success');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Failed to delete Booking :(', 'Error');
        }
        return redirect()->route('form/allbooking');
    }



}
