<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Models\Hall;
use App\Models\HallType;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;

class HallController extends Controller
{
    public function hallCreate(Request $request)
    {
        $floors = Floor::all();
        $selectedFloorId = $request->old('floor_id ');
        $halltypes = HallType::all();
        $selectedHallTypeId = $request->old('halltype_id ');
        return view('hall/add_hall',compact('floors','halltypes','selectedFlo   orId','selectedHallTypeId'));
    }
    public function hallStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'floor_id' => 'required|exists:floors,id', // Ensure floor_id exists in the floors table
            'halltype_id' => 'required|exists:halltypes,id', // Ensure halltype_id exists in the halltypes table
            'hall_number' => 'required', // Ensure hall_number is a string and not too long
            'description' => 'nullable', // Ensure base_price is numeric and not negative
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Hall::create([
            'floor_id' => $request->input('floor_id'),
            'halltype_id' => $request->input('halltype_id'),
            'hall_number' => $request->input('hall_number'),
            'base_price' => $request->input('base_price'),
            'description' => $request->input('description'),
        ]);
        Toastr::success('Hall created successfully :)', 'Success');
        return redirect()->route('hall/list');

    }
    public function hallList()
    {
        $halls = Hall::all();
        return view('hall/view_hall',compact('halls'));
    }

    public function hallEdit(Request $request,$id)
    {
        $hall = Hall::find($id);
        $floors = Floor::all();
        $selectedFloorId = $hall->floor_id;


        $halltypes = HallType::all();
        $selectedHallTypeId = $hall->halltype_id ;

        return view('hall/add_hall', compact('hall','floors','selectedFloorId','halltypes','selectedHallTypeId'));
    }

    public function hallUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'floor_id' => 'required|exists:floors,id', // Ensure floor_id exists in the floors table
            'halltype_id' => 'required|exists:halltypes,id', // Ensure halltype_id exists in the halltypes table
            'hall_number' => 'required', // Ensure hall_number is a string and not too long
            'description' => 'nullable', // Ensure base_price is numeric and not negative
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $hall = Hall::find($id);

        if (!$hall) {
            Toastr::error('Hall not found :)', 'Error');
            return redirect()->route('hall/list');
        }

        try {
            $hall->update([
                'floor_id' => $request->input('floor_id'),
                'halltype_id' => $request->input('halltype_id'),
                'hall_number' => $request->input('hall_number'),
                'base_price' => $request->input('base_price'),
                'description' => $request->input('description'),
            ]);

            Toastr::success('Hall updated successfully :)', 'Success');
            return redirect()->route('hall/list');
        } catch (\Exception $e) {
            Toastr::error('Hall update failed :)', 'Error');
            return redirect()->back()->withInput();
        }
    }
    public function hallDelete($id)
    {
        try {
            $hall = Hall::find($id);
            if ($hall) {
                $hall->delete();
                Toastr::success('Hall deleted successfully :)', 'Success');
                return redirect()->route('hall/list');
            } else {
                Toastr::error('Hall not found :)', 'Error');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            Toastr::error('Hall deletion failed :)', 'Error');
            return redirect()->back();
        }
    }
    public function updateStatus(Request $request)
    {
        $hall = Hall::find($request->hall_id);
        $hall->status = $request->status;
        $hall->save();

        return response()->json(['status' => 'success', 'new_status' => $hall->status]);
    }
}
