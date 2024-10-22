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
        $offerPackage = OfferPackage::find($id);

        // Handle images
        $images = $request->file('image');
        $existingImageNames = explode(',', $offerPackage->image) ?? [];
        $imageNames = $existingImageNames;

        if ($images) {
            foreach ($images as $image) {
                $imageName = time() . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move('images', $imageName);
                $imageNames[] = $imageName;
            }
        }

        if ($request->has('remove_images')) {
            $imagesToRemove = $request->input('remove_images');
            foreach ($imagesToRemove as $imageToRemove) {
                $filePath = public_path('images/' . $imageToRemove); // Ensure this points to a file
                if (file_exists($filePath) && is_file($filePath)) { // Check if it's a file
                    unlink($filePath); // Only unlink if it's a file
                } else {
                    // Optionally log or handle the case where the file does not exist or is a directory
                    // Log::warning("Attempted to delete a non-file: " . $filePath);
                }
                $imageNames = array_diff($imageNames, [$imageToRemove]);
            }
        }

        $offerPackage->update([
            'hotel_id' => $request->input('hotel_id'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => implode(',', array_values($imageNames)),
            'discount_type' => $request->input('discount_type'),
            'discount_value' => $request->input('discount_value'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'is_active' => $request->input('is_active') === 'on' ? 1 : 0,
        ]);

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
