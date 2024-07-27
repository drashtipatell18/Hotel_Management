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
        $allBookings = DB::table('booking')->get();
        return view('formbooking.allbooking',compact('allBookings'));
    }

    public function bookingAdd()
    {
        $data = DB::table('room_types')->get();
        $user = DB::table('customers')->select('id','name','lname')->get();
        return view('formbooking.bookingadd',compact('data','user'));
    }
    public function getRoomNumbers($roomTypeId)
    {
        $roomNumbers = DB::table('rooms')
        ->where('room_type_id', $roomTypeId)
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

    public function getCustomerDetails($customerName)
    {
        $customer = DB::table('customers')->where('name', $customerName)->first();

        if ($customer) {
            return response()->json([
                'email' => $customer->email,
                'phone_number' => $customer->ph_number,
            ]);
        } else {
            return response()->json(['error' => 'Customer not found'], 404);
        }
    }

    public function bookingEdit($id)
    {
        $bookingEdit = DB::table('booking')->where('id',$id)->first();
        $users = DB::table('customers')->select('id','name','lname')->get();
        $roomTypes = DB::table('room_types')->get();
        $floors = DB::table('floors')->pluck('floor_name', 'id');


        $roomNumbers = DB::table('rooms')
        ->where('room_type_id', $bookingEdit->room_type_id)
        ->where('floor_id', $bookingEdit->floor_id)
        ->pluck('room_number', 'id');

        return view('formbooking.bookingedit',compact('bookingEdit','users','roomTypes','roomNumbers','floors'));
    }


    public function saveRecord(Request $request)
    {

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
                $booking->check_out_date = $request->check_out_date;
                $booking->email = $request->email;
                $booking->phone_number = $request->phone_number;
                $booking->message = $request->message;

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
            $booking->check_out_date = $request->check_out_date;
            $booking->email = $request->email;
            $booking->phone_number = $request->phone_number;
            $booking->message = $request->message;




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
    public function deleteRecord(Request $request)
    {
        try {

            Booking::destroy($request->id);
            unlink('assets/upload/'.$request->fileupload);
            Toastr::success('Booking deleted successfully :)','Success');
            return redirect()->back();

        } catch(\Exception $e) {

            DB::rollback();
            Toastr::error('Booking delete fail :)','Error');
            return redirect()->back();
        }
    }

}
