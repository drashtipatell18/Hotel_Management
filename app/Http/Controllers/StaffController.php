<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Position;
use App\Models\Staff;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;


class StaffController extends Controller
{
    public function staffCreate(Request $request)
    {
        $hotels = Hotel::all();
        $selectedHotelId = $request->old('hotel_id');
        $positions = Position::all();
        $selectedPositionId = $request->old('position_id');
        return view('staff.add_staff', compact('hotels','selectedHotelId','positions','selectedPositionId'));
    }
    public function staffStore(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required',
            'first_name'   => 'required|string|max:255',
            'last_name'   => 'required|string|max:255',
            'email'      => 'required|string|max:255',
            'phone'  => 'required|digits:10',
            'position_id' => 'required',
            'salary' => 'required|integer',
            'birth_date' => 'required',
            'hire_date' => 'required',
            'gender' => 'required',
            'aadharcard' => 'file',
            'address' => 'required',
            'profile_pic'=> 'file'
        ]);

        try{
            $photo= $request->profile_pic;
            $file_name = rand() . '.' .$photo->getClientOriginalName();
            $photo->move(public_path('/assets/upload/'), $file_name);

            $aadharcard= $request->aadharcard;
            $file_name1 = rand() . '.' .$aadharcard->getClientOriginalName();
            $aadharcard->move(public_path('/assets/upload/'), $file_name1);

            $staff = new Staff;
            $staff->hotel_id = $request->hotel_id;
            $staff->first_name = $request->first_name;
            $staff->last_name = $request->last_name;
            $staff->email       = $request->email;
            $staff->gender = $request->gender;
            $staff->phone  = $request->phone;
            $staff->profile_pic  = $file_name;
            $staff->birth_date = $request->birth_date;
            $staff->position_id  = $request->position_id;
            $staff->salary  = $request->salary;
            $staff->hire_date = $request->hire_date;
            $staff->aadharcard  = $file_name1;
            $staff->address     = $request->address;
            $staff->save();
            Toastr::success('Staff created successfully :)','Success');
            return redirect()->route('staff/list');
        }
        catch(\Exception $e) {
            Toastr::error('Add Staff Type fail :)','Error');
            return redirect()->back();
        }

    }

    public function staffList()
    {
        $allStaff = Staff::all();
        return view('staff.view_staff',compact('allStaff'));
    }
    public function staffEdit(Request $request,$id)
    {
        $staff = Staff::find($id);
        $hotels = Hotel::all();
        $selectedHotelId = $staff->hotel_id;

        $positions = Position::all();
        $selectedPositionId = $staff->position_id;

        return view('staff.add_staff', compact('staff','hotels','selectedHotelId','positions','selectedPositionId'));
    }
    public function staffUpdate(Request $request,$id)
    {
        $request->validate([
            'hotel_id' => 'required',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|digits:10',
            'salary' => 'required|integer',
            'birth_date' => 'required',
            'hire_date' => 'required',
            'gender' => 'required',
            'aadharcard' => 'nullable|file',
            'address' => 'required',
            'profile_pic' => 'nullable|file'
        ]);

        try {
            $staff = Staff::find($id);
            $staff->hotel_id = $request->hotel_id;
            $staff->first_name = $request->first_name;
            $staff->last_name = $request->last_name;
            $staff->email = $request->email;
            $staff->gender = $request->gender;
            $staff->phone = $request->phone;
            $staff->birth_date = $request->birth_date;
            $staff->position_id = $request->position_id;
            $staff->salary = $request->salary;
            $staff->hire_date = $request->hire_date;
            $staff->address = $request->address;

            if ($request->hasFile('profile_pic')) {
                $photo = $request->file('profile_pic');
                $file_name = rand() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('/assets/upload/'), $file_name);
                $staff->profile_pic = $file_name;
            }
            if ($request->hasFile('aadharcard')) {
                $aadharcard = $request->file('aadharcard');
                $file_name1 = rand() . '.' . $aadharcard->getClientOriginalExtension();
                $aadharcard->move(public_path('/assets/upload/'), $file_name1);
                $staff->aadharcard = $file_name1;
            }
            $staff->save();
            Toastr::success('Staff updated successfully :)', 'Success');
            return redirect()->route('staff/list');
        }
        catch (\Exception $e) {
            Toastr::error('Update Staff fail :)', 'Error');
            return redirect()->back();
        }
    }

    public function staffDelete($id)
    {
        try {
            $staff = Staff::findOrFail($id);
            if ($staff->profile_pic && file_exists(public_path('assets/upload/' . $staff->profile_pic))) {
                unlink(public_path('assets/upload/' . $staff->profile_pic));
            }

            if ($staff->aadharcard && file_exists(public_path('assets/upload/' . $staff->aadharcard))) {
                unlink(public_path('assets/upload/' . $staff->aadharcard));
            }
            $staff->delete();
            Toastr::success('Staff deleted successfully :)', 'Success');
            return redirect()->route('staff/list');
        } catch (\Exception $e) {
            Toastr::error('Staff deletion failed :)', 'Error');
            return redirect()->route('staff/list');
        }
    }

    public function updateStatus(Request $request)
    {
        $staff = Staff::find($request->staff_id);
        $staff->status = $request->status;
        $staff->save();

        return response()->json(['status' => 'success', 'new_status' => $staff->status]);
    }


}
