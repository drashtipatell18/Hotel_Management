<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Floor;
use Brian2694\Toastr\Facades\Toastr;

class FloorController extends Controller
{
    public function floorCreate()
    {
        return view('floors.add_floor');
    }
    public function floorStore(Request $request)
    {
        $request->validate([
            'floor_name' => 'required|string|max:255',
            'description' => 'required|nullable|string',
        ]);
        try{
            Floor::create([
                'floor_name' => $request->floor_name,
                'description' => $request->description,
            ]);
            Toastr::success('Amenities updated successfully :)', 'Success');
            return redirect()->route('floor/list');
        }
        catch (\Exception $e) {
            Toastr::error('Amenities  failed :)', 'Error');
            return redirect()->back()->withInput();
        }
    }
    public function floorList()
    {
        $floors = Floor::all();
        return view('floors.view_floor',compact('floors'));
    }
    public function floorEdit($id)
    {
        $floor = Floor::find($id);
        return view('floors/add_floor', compact('floor'));
    }
    public function floorUpdate(Request $request, $id)
    {
        $request->validate([
            'floor_name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        try {
            $floor = Floor::find($id);
            if ($floor) {
                $floor->update([
                    'floor_name' => $request->floor_name,
                    'description' => $request->description,
                ]);
                Toastr::success('Floor updated successfully :)', 'Success');
                return redirect()->route('floor/list');
            } else {
                Toastr::error('Floor not found :)', 'Error');
                return redirect()->back()->withInput();
            }
        } catch (\Exception $e) {
            Toastr::error('Floor update failed :)', 'Error');
            return redirect()->back()->withInput();
        }
    }
    public function floorDelete($id)
    {
        try {
            $floor = Floor::find($id);
            if ($floor) {
                $floor->delete();
                Toastr::success('Floor deleted successfully :)', 'Success');
                return redirect()->route('floor/list');
            } else {
                Toastr::error('Floor not found :)', 'Error');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            Toastr::error('Floor deletion failed :)', 'Error');
            return redirect()->back();
        }
    }
}
