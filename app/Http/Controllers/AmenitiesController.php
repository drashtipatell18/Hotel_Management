<?php

namespace App\Http\Controllers;

use App\Models\Amenities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;

class AmenitiesController extends Controller
{
    public function amenitiesCreate()
    {
        return view('amenities/add');
    }

public function amenitiesStore(Request $request)
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
            $image->move(public_path('/assets/amenities/'), $imageName);
            $imagePath = $imageName;
        }

        // Create a new Amenity record
        $amenity = new Amenities;
        $amenity->name = $request->input('name');
        $amenity->image = $imagePath;
        $amenity->description = $request->input('description');
        $amenity->save();
        return redirect()->route('amenities/list')
            ->with('success', 'Amenity added successfully!');
    } catch (\Exception $e) {
        Log::error('Error saving amenity: ' . $e->getMessage());
        return redirect()->route('amenities/list')
            ->with('error', 'There was a problem adding the amenity.');
    }
}
public function amenitiesList()
{
    $allAmenitiesList = DB::table('amenities')->get();
    return view('amenities.listamenities',compact('allAmenitiesList'));
}
public function amenitiesEdit($id)
{
    $amenitiesList = Amenities::where('id',$id)->first();
    return view('amenities.amenitiesedit',compact('amenitiesList'));
}
public function amenitiesUpdate(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        'description' => 'string'
    ]);

        DB::beginTransaction();
        try {
            $amenities = Amenities::findOrFail($id);
            $amenities->name = $request->input('name');
            $amenities->description = $request->input('description');

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/assets/amenities/'), $imageName);
                $amenities->image = $imageName;
            }
            $amenities->save();
            DB::commit();
            Toastr::success('Amenities updated successfully :)', 'Success');
            return redirect()->route('amenities/list');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Amenities  failed :)', 'Error');
            return redirect()->back()->withInput();
        }
}

public function amenitiesDelete($id)
{
    DB::beginTransaction();
    try {
        $amenity = Amenities::findOrFail($id);
        $amenity->delete();
        DB::commit();
        Toastr::success('Amenity deleted successfully :)', 'Success');
    } catch (\Exception $e) {
        DB::rollback();
        Toastr::error('Failed to delete amenity :(', 'Error');
    }
    return redirect()->route('amenities/list');
}





}
