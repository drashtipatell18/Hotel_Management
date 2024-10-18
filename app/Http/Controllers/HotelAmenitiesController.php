<?php

namespace App\Http\Controllers;

use App\Models\HotelAmenity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;

class HotelAmenitiesController extends Controller
{
    public function amenitiesHotelCreate()
    {
        return view('hotelAmenities/addhotel');
    }
    public function amenitiesHotelStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Add size limit
            'description' => 'nullable|string'
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
            $amenity = new HotelAmenity();
            $amenity->name = $request->input('name');
            $amenity->image = $imagePath;
            $amenity->description = $request->input('description');
            $amenity->save();
            return redirect()->route('amenities/hotel/list')
                ->with('success', 'Amenity added successfully!');
        } catch (\Exception $e) {
            Log::error('Error saving amenity: ' . $e->getMessage());
            return redirect()->route('amenities/hotel/list')
                ->with('error', 'There was a problem adding the amenity.');
        }
    }
    public function amenitiesHotelList()
    {
        $allAmenitiesList = HotelAmenity::all();
        return view('hotelAmenities.listhotel_amenities',compact('allAmenitiesList'));
    }
    public function amenitiesHotelEdit($id)
    {
        $amenitiesList = HotelAmenity::where('id',$id)->first();
        return view('hotelAmenities.amenities_hoteledit',compact('amenitiesList'));
    }

    public function amenitiesHotelUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'string'
        ]);

            DB::beginTransaction();
            try {
                $amenities = HotelAmenity::findOrFail($id);
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
                return redirect()->route('amenities/hotel/list');
            } catch (\Exception $e) {
                DB::rollback();
                Toastr::error('Amenities  failed :)', 'Error');
                return redirect()->back()->withInput();
            }
    }

    public function amenitiesHotelDelete($id)
    {
        DB::beginTransaction();
        try {
            $amenity = HotelAmenity::findOrFail($id);
            $amenity->delete();
            DB::commit();
            Toastr::success('Amenity deleted successfully :)', 'Success');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Failed to delete amenity :(', 'Error');
        }
        return redirect()->route('amenities/hotel/list');
    }

}
