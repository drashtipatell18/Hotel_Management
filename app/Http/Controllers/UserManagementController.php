<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;

class UserManagementController extends Controller
{
    /** user list */
    public function userList()
    {
        $users = User::where('role_id', 0)->get();
        return view('usermanagement.listuser',compact('users'));
    }

    /** add neew users */
    public function userAddNew()
    {
        return view('usermanagement.useraddnew');
    }

    /** edit record */
    public function userView($user_id)
    {
        $userData = User::where('user_id',$user_id)->first();
        return view('usermanagement.useredit',compact('userData'));
    }

    /** update record */
    public function userUpdate(Request $request, $id)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'phone_number' => 'required|string|max:15',
            'position'     => 'nullable|string|max:255',
            'department'   => 'nullable|string|max:255',
            'profile'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $updateRecord = [
            'name'         => $request->name,
            'email'        => $request->email,
            'phone_number' => $request->phone_number,
            'position'     => $request->position,
            'department'   => $request->department,
            'role_id'      => 0, // Set role_id dynamically
        ];

        if ($request->hasFile('profile')) {
            $fileName = time() . '.' . $request->profile->extension();
            $request->profile->move(public_path('assets/img'), $fileName);
            $updateRecord['profile'] = $fileName;
        }

        User::where('id', $id)->update($updateRecord);

        Toastr::success('Updated record successfully :)', 'Success');
        return redirect()->route('users/list/page');
    }

    /** delete record */
    public function userDelete($id)
    {
        try {

            $deleteRecord = User::find($id);
            $deleteRecord->delete();
            Toastr::success('User deleted successfully :)','Success');
            return redirect()->back();

        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('User delete fail :)','Error');
            return redirect()->back();
        }
    }

    /** get users data */
    public function getUsersData(Request $request)
    {
        $draw            = $request->get('draw');
        $start           = $request->get("start");
        $rowPerPage      = $request->get("length"); // total number of rows per page
        $columnIndex_arr = $request->get('order');
        $columnName_arr  = $request->get('columns');
        $order_arr       = $request->get('order');
        $search_arr      = $request->get('search');
    
        $columnIndex     = $columnIndex_arr[0]['column']; // Column index
        $columnName      = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue     = $search_arr['value']; // Search value
    
        // Get users with role_id = 0
        $users = DB::table('users')->where('role_id', 0);
    
        // Total records with role_id = 0
        $totalRecords = $users->count();
    
        // Total filtered records
        $totalRecordsWithFilter = $users->where(function ($query) use ($searchValue) {
            $query->where('name', 'like', '%' . $searchValue . '%');
            $query->orWhere('email', 'like', '%' . $searchValue . '%');
            $query->orWhere('position', 'like', '%' . $searchValue . '%');
            $query->orWhere('phone_number', 'like', '%' . $searchValue . '%');
            $query->orWhere('status', 'like', '%' . $searchValue . '%');
        })->count();
    
        // Fetch data with search filter and pagination
        $records = $users->orderBy($columnName, $columnSortOrder)
            ->where(function ($query) use ($searchValue) {
                $query->where('name', 'like', '%' . $searchValue . '%');
                $query->orWhere('email', 'like', '%' . $searchValue . '%');
                $query->orWhere('position', 'like', '%' . $searchValue . '%');
                $query->orWhere('phone_number', 'like', '%' . $searchValue . '%');
                $query->orWhere('status', 'like', '%' . $searchValue . '%');
            })
            ->skip($start)
            ->take($rowPerPage)
            ->get();
    
        $data_arr = [];
    
        foreach ($records as $key => $record) {
            $profile = $record->profile && file_exists(public_path('assets/img/' . $record->profile))
            ? '<img src="'.asset('assets/img/' . $record->profile).'" width="80" class="avatar avatar-sm mr-2">'
            : '<img src="'.asset('assets/img/men.jpg').'" width="80" class="avatar avatar-sm mr-2">';
    
            $modify = '
                <td class="text-right">
                    <a href="'.url('users/add/edit/'.$record->user_id).'" style="font-size: 23px; padding: 5px; color: #009688;">
                        <i class="fas fa-pencil-alt fa-xs"></i>
                    </a>
                    <a href="'.url('users/delete/'.$record->id).'" onclick="return confirm(\'Are you sure you want to delete this User?\');" style="font-size: 23px; padding: 5px; color: #009688;">
                        <i class="fas fa-trash fa-xs"></i>
                    </a>
                </td>
            ';
            $data_arr [] = [
                "user_id"      => $record->user_id,
                "profile"      => $profile,
                "name"         => $record->name,
                "email"        => $record->email,
                "position"     => $record->position,
                "phone_number" => $record->phone_number,
                "status"       => $record->status,
                "modify"       => $modify,
            ];
        }
    
        $response = [
            "draw"                 => intval($draw),
            "iTotalRecords"        => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordsWithFilter,
            "aaData"               => $data_arr
        ];
        return response()->json($response);
    }
    

    public function createUser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|numeric',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|same:password',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate file as an image
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->country = $request->country;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;
        $user->role_id = 0;
        $user->position = $request->position;
        $user->department = $request->department;
        $user->password = bcrypt($request->password);

        if ($request->hasFile('profile')) {
            $fileName = time() . '.' . $request->profile->extension();
            $request->profile->move(public_path('assets/img'), $fileName);
            $user->profile = $fileName;
        }

        $user->save();

        Toastr::success('User created successfully :)', 'Success');
        return redirect()->route('users/list/page');
    }
}
