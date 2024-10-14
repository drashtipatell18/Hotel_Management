<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;

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
            'fileupload' => 'file',
            'room_type'     => 'required|string|max:255',
            'total_numbers' => 'required|string|max:255',
            'time' => 'required|string|max:255',
            'arrival_date'  => 'required|string|max:255',
            'depature_date' => 'required|string|max:255',
            'aadharcard' => 'file',
            'phone_number'  => 'required|digits:10',
            'address'    => 'required|string|max:255',
        ],[
            'fileupload' => 'The Profile pic is required'
        ]);

        DB::beginTransaction();
        try {

            $photo= $request->fileupload;
            $file_name = rand() . '.' .$photo->getClientOriginalName();
            $photo->move(public_path('/assets/img/'), $file_name);

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
            $customer->country   = $request->country;
            $customer->state   = $request->state;
            $customer->city   = $request->city;
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

    public function updateRecord(Request $request, $id)
    {
       
        try {
            \Log::info('Starting update for customer ID: ' . $id);
            $customer = Customer::findOrFail($id);
            \Log::info('Customer found: ', $customer->toArray());
    
            // Update customer details
            $customer->name = $request->input('name');
            $customer->lname = $request->input('lname');
            $customer->email = $request->input('email');
            $customer->date = $request->input('date');
            $customer->gender = $request->input('gender');
            $customer->room_type = $request->input('room_type');
            $customer->total_numbers = $request->input('total_numbers');
            $customer->time = $request->input('time');
            $customer->arrival_date = $request->input('arrival_date');
            $customer->country = $request->input('country');
            $customer->state = $request->input('state');
            $customer->city = $request->input('city');
            $customer->depature_date = $request->input('depature_date');
            $customer->ph_number = $request->input('phone_number');
            $customer->address = $request->input('address');
    
            \Log::info('Customer details before save:', $customer->toArray());
    
            // Handle Aadhar card upload
            if ($request->hasFile('aadharcard')) {
                if (file_exists(public_path('/assets/upload/' . $customer->aadharcard))) {
                    unlink(public_path('/assets/upload/' . $customer->aadharcard)); // Delete old Aadhar card
                    \Log::info('Old Aadhar card deleted: ' . $customer->aadharcard);
                }
    
                $photo = $request->file('aadharcard'); // Get the uploaded file
                $file_name = rand() . '.' . $photo->getClientOriginalName(); // Generate a unique file name
                $photo->move(public_path('/assets/upload/'), $file_name); // Move the file to the specified directory
                $customer->aadharcard = $file_name; // Update the customer's Aadhar card field
                \Log::info('New Aadhar card uploaded: ' . $file_name);
            }
    
            // Handle additional file upload
            if ($request->hasFile('fileupload')) {
                if (file_exists(public_path('/assets/img/' . $customer->fileupload))) {
                    unlink(public_path('/assets/img/' . $customer->fileupload)); // Delete old file
                    \Log::info('Old file deleted: ' . $customer->fileupload);
                }
    
                $photo = $request->file('fileupload');
                $file_name = rand() . '.' . $photo->getClientOriginalName();
                $photo->move(public_path('/assets/img/'), $file_name);
                $customer->fileupload = $file_name; // Update the customer's fileupload field
                \Log::info('New file uploaded: ' . $file_name);
            }
            $customer->save(); 
            Toastr::success('Customer updated successfully :)', 'Success');
            return redirect()->route('form/allcustomers/page'); // Redirect to the customers page
          
    
            $user = User::findOrFail($customer->user_id);
    
          
            if($user)
            {
                $user->name = $request->input('name');
                $user->lname = $request->input('lname');
                $user->email = $request->input('email');
                $user->phone_number = $request->input('phone_number');
                $user->dob = $customer->date;
               
                
                if ($request->hasFile('profile')) {
                    $photo = $request->file('profile');
                    $file_name2 = rand() . '_' . $photo->getClientOriginalName();
                    $photo->move(public_path('/assets/img/'), $file_name2);
                    $user->profile = $file_name2; // Update user's profile image
                }
            }
            // Update user details
        
            $user->save(); 
           
    
            // Success message
            Toastr::success('Customer updated successfully :)', 'Success');
            return redirect()->route('form/allcustomers/page'); // Redirect to the customers page
        } catch (\Exception $e) {
            // Log the error message
            \Log::error('Error updating customer: ' . $e->getMessage());
            
            // Rollback any database changes if using transactions
            DB::rollback(); // Rollback changes if necessary
            
            // Error message
            Toastr::error('Update customer failed :)', 'Error');
            return redirect()->back()->withInput(); // Redirect back with input
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
