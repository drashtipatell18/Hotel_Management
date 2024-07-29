<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class PositionController extends Controller
{
    public function positionCreate()
    {
        return view('positions.add_position');
    }
    public function positionStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        try{
            Position::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);
            Toastr::success('Position creeated successfully :)', 'Success');
            return redirect()->route('position/list');
        }
        catch (\Exception $e) {
            Toastr::error('Position  failed :)', 'Error');
            return redirect()->back()->withInput();
        }
    }
    public function positionList()
    {
        $positions = Position::all();
        return view('positions.view_position',compact('positions'));
    }
    public function positionEdit($id)
    {
        $position = Position::find($id);
        return view('positions.add_position', compact('position'));
    }
    public function positionUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        try {
            $position = Position::find($id);
            if ($position) {
                $position->update([
                    'name' => $request->name,
                    'description' => $request->description,
                ]);
                Toastr::success('Position updated successfully :)', 'Success');
                return redirect()->route('position/list');
            } else {
                Toastr::error('Position not found :)', 'Error');
                return redirect()->back()->withInput();
            }
        } catch (\Exception $e) {
            Toastr::error('Position update failed :)', 'Error');
            return redirect()->back()->withInput();
        }
    }
    public function positionDelete($id)
    {
        try {
            $position = Position::find($id);
            if ($position) {
                $position->delete();
                Toastr::success('Position deleted successfully :)', 'Success');
                return redirect()->route('position/list');
            } else {
                Toastr::error('Position not found :)', 'Error');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            Toastr::error('Position deletion failed :)', 'Error');
            return redirect()->back();
        }
    }
}
