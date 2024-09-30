<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facilities;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;


class FacilitiesController extends Controller
{
    public function facilitiesCreate()
    {
        return view('facilities/add');
    }

    public function facilitiesStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'string'
        ]);

        try {
            $imagePath = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/assets/facilities/'), $imageName);
                $imagePath = $imageName;
            }

            // Create a new Amenity record
            $facilities = new Facilities;
            $facilities->name = $request->input('name');
            $facilities->image = $imagePath;
            $facilities->description = $request->input('description');
            $facilities->save();
            return redirect()->route('facilities/list')
                ->with('success', 'Facilities added successfully!');
        } catch (\Exception $e) {
            Log::error('Error saving amenity: ' . $e->getMessage());
            return redirect()->route('facilities/list')
                ->with('error', 'There was a problem adding the facilities.');
        }
    }
    public function facilitiesList()
    {
        $allFacilitiesList = DB::table('facilities')->get();
        return view('facilities.listfacilities',compact('allFacilitiesList'));
    }
    public function facilitiesEdit($id)
    {
        $facilitiesList = Facilities::where('id',$id)->first();
        return view('facilities.facilitiesedit',compact('facilitiesList'));
    }
    public function facilitiesUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
            'description' => 'string'
        ]);

            DB::beginTransaction();
            try {
                $facilities = Facilities::findOrFail($id);
                $facilities->name = $request->input('name');
                $facilities->description = $request->input('description');

                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = rand() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('/assets/amenities/'), $imageName);
                    $facilities->image = $imageName;
                }
                $facilities->save();
                DB::commit();
                Toastr::success('Facilities updated successfully :)', 'Success');
                return redirect()->route('facilities/list');
            } catch (\Exception $e) {
                DB::rollback();
                Toastr::error('Facilities  failed :)', 'Error');
                return redirect()->back()->withInput();
            }
    }

    public function facilitiesDelete($id)
    {
        DB::beginTransaction();
        try {
            $facilities = Facilities::findOrFail($id);
            $facilities->delete();
            DB::commit();
            Toastr::success('Facilities deleted successfully :)', 'Success');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Failed to delete Facilities :(', 'Error');
        }
        return redirect()->route('facilities/list');
    }
}
