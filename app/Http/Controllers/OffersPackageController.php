<?php

namespace App\Http\Controllers;

use App\Models\OfferPackage;
use Illuminate\Http\Request;
use App\Models\Hotel;

class OffersPackageController extends Controller
{
    public function offerPackageCreate()
    {
        $hotels = Hotel::pluck('name', 'id');
        return view('offerPackage.create', compact('hotels'));
    }

    public function offerPackageStore(Request $request)
    {

        $request->validate([
            'hotel_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'discount_type' => 'required',
            'discount_value' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'is_active' => 'required',
        ]);
        $images = $request->file('image'); // Change to handle multiple images
        $imageNames = []; // Array to hold image names

        // Check if $images is an array before iterating
        if (is_array($images)) {
            foreach ($images as $image) {
                $imageName = time().uniqid().'.'.$image->getClientOriginalExtension(); // Unique name for each image
                $image->move('images', $imageName);
                $imageNames[] = $imageName; // Store the image name
            }
        }
        // dd($imageNames);
        OfferPackage::create(
            [
                'hotel_id' => $request->input('hotel_id'),
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'image' => implode(',', $imageNames), // Store as JSON
                'discount_type' => $request->input('discount_type'),
                'discount_value' => $request->input('discount_value'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'is_active' => $request->input('is_active') === 'on' ? 1 : 0,
            ]
        );
        return redirect()->route('offer/package/list')->with('success', 'Offer Package created successfully');
    }

    public function offerPackageEdit($id)
    {
        $offerPackage = OfferPackage::find($id);
        $hotels = Hotel::pluck('name', 'id');
        return view('offerPackage.edit', compact('offerPackage', 'hotels'));
    }

    public function offerPackageUpdate(Request $request, $id)
    {
        dd($request->all());
        // $request->validate([
        //     'hotel_id' => 'required',
        //     'title' => 'required',
        //     'description' => 'required',
        //     'image' => 'required',
        //     'discount_type' => 'required',
        //     'discount_value' => 'required',
        //     'start_date' => 'required',
        //     'end_date' => 'required',
        //     'is_active' => 'required',
        // ]);
        $offerPackage = OfferPackage::find($id);

        $images = $request->file('images'); // Change to handle multiple images
        $imageNames = json_decode($offerPackage->image, true); // Decode existing images

        if ($images) {
            foreach ($images as $image) {
                $imageName = time().uniqid().'.'.$image->getClientOriginalExtension(); // Unique name for each image
                $image->move(public_path('images'), $imageName);
                $imageNames[] = $imageName; // Add new image name to the array
            }
        }
        $offerPackage->update(
            [
                'hotel_id' => $request->input('hotel_id'),
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'image' => implode(',', $imageNames), // Store as JSON
                'discount_type' => $request->input('discount_type'),
                'discount_value' => $request->input('discount_value'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'is_active' => $request->input('is_active') === 'on' ? 1 : 0,
            ]
        );
        return redirect()->route('offer/package/list')->with('success', 'Offer Package updated successfully');
    }

    public function offerPackageDelete($id)
    {
        $offerPackage = OfferPackage::find($id);
        $offerPackage->delete();
        return redirect()->route('offer/package/list')->with('success', 'Offer Package deleted successfully');
    }

    public function offerPackageList()
    {
        $offerPackages = OfferPackage::all();
        return view('offerPackage.index', compact('offerPackages'));
    }
}
