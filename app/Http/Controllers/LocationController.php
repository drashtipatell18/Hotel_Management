<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function create()
    {
        // dd('isha');
        return view('location.location');
    }

    public function store(Request $request)
    {
        // Uncomment if you want to debug the request data
        // dd($request->all());

        // Validate the input
        $request->validate([
            'address' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        // Create a new location entry
        Location::create([
            'address' => $request->input('address'),
            'lat' => $request->input('latitude'),
            'lng' => $request->input('longitude'),
        ]);

        // Redirect with a success message
        return redirect()->route('location.create')->with('success', 'Location added successfully');
    }
}
