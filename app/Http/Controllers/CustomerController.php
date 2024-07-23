<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function allCustomers()
    {
        $allCustomers = DB::table('customers')->get();
        return view('formcustomers.allcustomers',compact('allCustomers'));
    }
    public function addCustomer()
    {
        $data = DB::table('room_types')->get();
        $user = DB::table('users')->get();
        return view('formcustomers.addcustomer',compact('data','user'));
    }
    public function saveCustomer(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name'   => 'required|string|max:255',
            'lname'   => 'required|string|max:255',
            'email'      => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'gender' => 'required',
            'fileupload' => 'required|file',
            'room_type'     => 'required|string|max:255',
            'total_numbers' => 'required|string|max:255',
            'time' => 'required|string|max:255',
            'arrival_date'  => 'required|string|max:255',
            'depature_date' => 'required|string|max:255',
            'aadharcard' => 'required|file',
            'phone_number'  => 'required|string|max:255',
            'address'    => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try {

            $photo= $request->fileupload;
            $file_name = rand() . '.' .$photo->getClientOriginalName();
            $photo->move(public_path('/assets/upload/'), $file_name);

            $aadharcard= $request->aadharcard;
            $file_name1 = rand() . '.' .$aadharcard->getClientOriginalName();
            $aadharcard->move(public_path('/assets/upload/'), $file_name1);

            $customer = new Customer;
            $customer->name = $request->name;
            $customer->lname = $request->lname;
            $customer->email       = $request->email;
            $customer->date  = $request->date;
            $customer->gender = $request->gender;
            $customer->fileupload  = $file_name;
            $customer->room_type     = $request->room_type;
            $customer->total_numbers  = $request->total_numbers;
            $customer->time  = $request->time;
            $customer->arrival_date   = $request->arrival_date;
            $customer->depature_date  = $request->depature_date;
            $customer->ph_number   = $request->phone_number;
            $customer->aadharcard  = $file_name1;
            $customer->address     = $request->address;
            $customer->save();

            DB::commit();
            Toastr::success('Create new customer successfully :)','Success');
            return redirect()->route('form/allcustomers/page');

        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Add Customer fail :)','Error');
            return redirect()->back();
        }
    }
    public function updateCustomer($id)
    {
        $roomTypes = DB::table('room_types')->get();
        $customerEdit = DB::table('customers')->where('id',$id)->first();
        return view('formcustomers.editcustomer',compact('customerEdit','roomTypes'));
    }

    public function updateRecord(Request $request,$id)
    {
        DB::beginTransaction();
        try {
            $customer = Customer::findOrFail($id);

            $customer->name = $request->input('name');
            $customer->lname = $request->input('lname');
            $customer->email = $request->input('email');
            $customer->date = $request->input('date');
            $customer->gender = $request->input('gender');
            $customer->room_type = $request->input('room_type');
            $customer->total_numbers = $request->input('total_numbers');
            $customer->time = $request->input('time');
            $customer->arrival_date = $request->input('arrival_date');
            $customer->depature_date = $request->input('depature_date');
            $customer->ph_number = $request->input('phone_number');
            $customer->address = $request->input('address');


            if ($request->hasFile('aadharcard')) {
                if (file_exists(public_path('/assets/upload/' . $customer->aadharcard))) {
                    unlink(public_path('/assets/upload/' . $customer->aadharcard));
                }

                $photo = $request->file('aadharcard');
                $file_name = rand() . '.' . $photo->getClientOriginalName();
                $photo->move(public_path('/assets/upload/'), $file_name);
                $customer->aadharcard = $file_name;
            }

            if ($request->hasFile('fileupload')) {
                if (file_exists(public_path('/assets/upload/' . $customer->fileupload))) {
                    unlink(public_path('/assets/upload/' . $customer->fileupload));
                }

                $photo = $request->file('fileupload');
                $file_name = rand() . '.' . $photo->getClientOriginalName();
                $photo->move(public_path('/assets/upload/'), $file_name);
                $customer->fileupload = $file_name;
            }



            $customer->save();

            DB::commit();
            Toastr::success('Customer updated successfully :)', 'Success');
            return redirect()->route('form/allcustomers/page');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Update customer failed :)', 'Error');
            return redirect()->back()->withInput();
        }
    }
    public function deleteRecord(Request $request)
    {
        try {

            Customer::destroy($request->id);
            unlink('assets/upload/'.$request->fileupload);
            Toastr::success('Customer deleted successfully :)','Success');
            return redirect()->back();

        } catch(\Exception $e) {

            DB::rollback();
            Toastr::error('Customer delete fail :)','Error');
            return redirect()->back();
        }
    }
    public function updateStatus(Request $request)
    {
        $customer = Customer::find($request->customer_id);
        $customer->status = $request->status;
        $customer->save();

        return response()->json(['status' => 'success', 'new_status' => $customer->status]);
    }
    public function getCustomerDetails(Request $request)
    {
        $customerId = $request->id;
        $customer = Customer::find($customerId);
        // dd($customer);

        if ($customer) {
            return response()->json(['status' => 'success', 'customer' => $customer]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Customer not found']);
        }
    }


}
