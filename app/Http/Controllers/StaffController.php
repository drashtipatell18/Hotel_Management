<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Position;
use App\Models\Staff;
use Hash;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\User;


class StaffController extends Controller
{
    public function staffCreate(Request $request)
    {
        $hotels = Hotel::all();
        $selectedHotelId = $request->old('hotel_id');
        $positions = Position::all();
        $selectedPositionId = $request->old('position_id');
        return view('staff.add_staff', compact('hotels', 'selectedHotelId', 'positions', 'selectedPositionId'));
    }
    public function staffStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'hotel_id' => 'required',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email',
            'phone' => 'required|digits:10',
            'position_id' => 'required',
            'salary' => 'required|integer',
            'birth_date' => 'required|date',
            'hire_date' => 'required|date',
            'gender' => 'required',
            'address' => 'nullable|string',
            'aadharcard' => 'nullable|file',
            'profile_pic' => 'nullable|file',
        ]);

        try {

            $file_name = null;
            $file_name1 = null;

            if ($request->hasFile('profile_pic')) {
                $photo = $request->file('profile_pic');
                $file_name = uniqid() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('/assets/img/'), $file_name);
            }

            // Check and process aadhar card upload
            if ($request->hasFile('aadharcard')) {
                $aadharcard = $request->file('aadharcard');
                $file_name1 = uniqid() . '.' . $aadharcard->getClientOriginalExtension();
                $aadharcard->move(public_path('/assets/upload/'), $file_name1);
            }

            $staff = new Staff;
            $staff->hotel_id = $request->hotel_id;
            $staff->first_name = $request->first_name;
            $staff->last_name = $request->last_name;
            $staff->email = $request->email;
            $staff->password = Hash::make($request->password);
            $staff->country = $request->country;
            $staff->city = $request->city;
            $staff->state = $request->state;
            $staff->gender = $request->gender;
            $staff->phone = $request->phone;
            $staff->profile_pic = $file_name;
            $staff->birth_date = $request->birth_date;
            $staff->position_id = $request->position_id;
            $staff->salary = $request->salary;
            $staff->hire_date = $request->hire_date;
            $staff->aadharcard = $file_name1;
            $staff->address = $request->address;

            if ($staff->save()) {
                \Log::info('Staff created with ID: ' . $staff->id);

                $user = new User;
                $user->staff_id = $staff->id;
                $user->name = $request->first_name;
                $user->lname = $request->last_name;
                $user->dob = $request->birth_date;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->profile = $file_name;  // Store the same profile picture
                $user->phone_number = $request->phone;
                $user->role_id = 1;

                $user->save();

                Toastr::success('Staff created successfully :)', 'Success');
                return redirect()->route('staff/list');
            } else {
                \Log::warning('Staff save failed, ID is null');
                Toastr::error('Add Staff Type fail :)', 'Error');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            \Log::error('Error creating staff: ' . $e->getMessage());
            Toastr::error('Add Staff Type fail :)', 'Error');
            return redirect()->back();
        }
    }


    public function staffList()
    {
        $allStaff = Staff::all();
        return view('staff.view_staff', compact('allStaff'));
    }
    public function staffEdit(Request $request, $id)
    {
        $staff = Staff::find($id);
        $hotels = Hotel::all();
        $selectedHotelId = $staff->hotel_id;

        $positions = Position::all();
        $selectedPositionId = $staff->position_id;

        $selectedCountry = $staff->country;
        $selectedState = $staff->state;
        $selectedCity = $staff->city;

        return view('staff.add_staff', compact('staff', 'hotels', 'selectedHotelId', 'positions', 'selectedPositionId','selectedCountry', 'selectedState', 'selectedCity'));
    }
    public function staffUpdate(Request $request, $id)
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
            'address' => 'required',
        ]);

        try {
            $staff = Staff::find($id);
            $staff->hotel_id = $request->hotel_id;
            $staff->first_name = $request->first_name;
            $staff->last_name = $request->last_name;
            $staff->email = $request->email;
            $staff->country = $request->country;
            $staff->state = $request->state;
            $staff->city = $request->city;
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
                $photo->move(public_path('/assets/img/'), $file_name);
                $staff->profile_pic = $file_name;
            }
            if ($request->hasFile('aadharcard')) {
                $aadharcard = $request->file('aadharcard');
                $file_name1 = rand() . '.' . $aadharcard->getClientOriginalExtension();
                $aadharcard->move(public_path('/assets/upload/'), $file_name1);
                $staff->aadharcard = $file_name1;
            }
            $staff->save();
      

            $user = User::where('staff_id', $id)->first();

            if ($user) {
                // Update user details with the new information
                $user->name = $request->first_name;
                $user->lname = $request->last_name;
                $user->dob = $request->birth_date;
                $user->email = $request->email;
                $user->phone_number = $request->phone;

                // Update profile picture in User if changed
                if ($request->hasFile('profile_pic')) { // Check if a new file is uploaded
                    $user->profile = $file_name; // Use the same filename as staff's profile picture
                }

                // Save updated user details
                if ($user->save()) {
                    Toastr::success('User updated successfully.', 'Success');
                } else {
                    Toastr::error('Failed to update user.', 'Error');
                }
            } else {
                // Handle the case where the user does not exist
                Toastr::error('User not found.', 'Error');
                return redirect()->back();
            }

            Toastr::success('Staff updated successfully :)', 'Success');
            return redirect()->route('staff/list');
        } catch (\Exception $e) {
            Toastr::error('Update Staff failed :)', 'Error');
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
