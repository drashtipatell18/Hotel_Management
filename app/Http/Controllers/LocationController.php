<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function locationCreate()
    {
        return view('location.location');
    }

    public function locationStore(Request $request)
    {
        // dd($request->all());

        // Validate the input
        $request->validate([
            'name' => 'required|string',
            'map_link' => 'required|string',
            'address' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        // Create a new location entry
        Location::create([
            'name' => $request->input('name'),
            'map_link' => $request->input('map_link'),
            'address' => $request->input('address'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
        ]);

        // Redirect with a success message
        return redirect()->route('location.list')->with('success', 'Location added successfully');
    }

    public function locationList()
    {
        $locations = Location::all();
        return view('location.locationList', compact('locations'));
    }

    public function locationEdit($id)
    {
        $location = Location::find($id);
        return view('location.locationEdit', compact('location'));
    }

    public function locationUpdate(Request $request, $id)
    {
        $location = Location::find($id);
        $location->update([
            'name' => $request->input('name'),
            'map_link' => $request->input('map_link'),
            'address' => $request->input('address'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
        ]);
        return redirect()->route('location.list')->with('success', 'Location updated successfully');
    }

    public function locationDelete($id)
    {
        $location = Location::find($id);
        $location->delete();
        return redirect()->route('location.list')->with('success', 'Location deleted successfully');
    }
}
