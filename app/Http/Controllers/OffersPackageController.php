<?php

namespace App\Http\Controllers;

use App\Models\OfferPackage;
use Illuminate\Http\Request;
use App\Models\Hotel;
use File;
use DB;

class OffersPackageController extends Controller
{
    public function offerPackageCreate()
    {
        $hotels = Hotel::pluck('name', 'id');
        return view('offerPackage.create', compact('hotels'));
    }

    public function offerPackageStore(Request $request)
    {
        // Validate the form inputs
        $request->validate([
            'hotel_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation for multiple images
            'discount_type' => 'required',
            'discount_value' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'is_active' => 'required',
        ]);

        // Create new OfferPackage
        $offerPackage = new OfferPackage;
        $offerPackage->hotel_id = $request->hotel_id;
        $offerPackage->title = $request->title;
        $offerPackage->description = $request->description;
        $offerPackage->offer_include = $request->offer_include;
        $offerPackage->discount_type = $request->discount_type;
        $offerPackage->discount_value = $request->discount_value;
        $offerPackage->start_date = $request->start_date;
        $offerPackage->end_date = $request->end_date;
        $offerPackage->is_active = $request->is_active === 'on' ? 1 : 0;
        
        // Array to store the image names
        $imageNames = [];

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                // Generate a unique image name
                $imageName = time() . '_' . $image->getClientOriginalName();
                // Move the image to the desired folder
                $image->move(public_path('/assets/offer/'), $imageName);
                // Add the image name to the array
                $imageNames[] = $imageName;
            }

            // Convert the array to a comma-separated string
            $offerPackage->image = implode(',', $imageNames);
        }

        // Save the offer package
        $offerPackage->save();

        return redirect()->route('offer/package/list')->with('success', 'Offer package created successfully!');
    }


    public function offerPackageEdit($id)
    {
        $offerPackage = OfferPackage::find($id);
        $hotels = Hotel::pluck('name', 'id');
        return view('offerPackage.edit', compact('offerPackage', 'hotels'));
    }

   
    public function offerPackageUpdate(Request $request, $id)
    {
        // Validate the input data
        $request->validate([
            'hotel_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation for multiple images
            'discount_type' => 'required',
            'discount_value' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'is_active' => 'required',
        ]);
    
        // Find the offer package by ID
        $offerPackage = OfferPackage::findOrFail($id);
        $offerPackage->hotel_id = $request->hotel_id;
        $offerPackage->title = $request->title;
        $offerPackage->description = $request->description;
        $offerPackage->offer_include = $request->offer_include;
        $offerPackage->discount_type = $request->discount_type;
        $offerPackage->discount_value = $request->discount_value;
        $offerPackage->start_date = $request->start_date;
        $offerPackage->end_date = $request->end_date;
        $offerPackage->is_active = $request->is_active === 'on' ? 1 : 0;
    
        // Handle images
        $imageNames = !empty($offerPackage->image) ? explode(',', $offerPackage->image) : [];
    
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                // Generate a unique image name
                $imageName = time() . '_' . $image->getClientOriginalName();
                // Move the image to the desired folder
                $image->move(public_path('/assets/offer/'), $imageName);
                // Add the new image name to the array
                $imageNames[] = $imageName;
            }
        }
    
        // Store unique, non-empty image names
        $offerPackage->image = implode(',', array_filter(array_unique($imageNames)));
    
        // Save the updated offer package
        $offerPackage->save();
    
        return redirect()->route('offer/package/list')->with('success', 'Offer Package updated successfully');
    }
    
    public function offerPackageDelete($id)
    {
        try {
            $offerPackage = OfferPackage::find($id);
            if ($offerPackage) {
                $offerPackage->delete();
                Toastr::success('Room deleted successfully :)', 'Success');
                return redirect()->route('offer/package/list');
            } else {
                Toastr::error('Room not found :)', 'Error');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            Toastr::error('Room deletion failed :)', 'Error');
            return redirect()->back();
        }
    }

    public function deleteImage($id)
    {
        // Find the OfferPackage
        $offerPackage = OfferPackage::findOrFail($id);
        
        // Split the images into an array
        $images = explode(',', $offerPackage->image); // Assuming 'image' is the field name
        
        // Check if there are images to delete
        if (!empty($images)) {
            // Get the first image name to delete
            $imageName = array_shift($images); // Remove the first image from the array
            
            // Update the images field in the database, ensuring no trailing commas
            $offerPackage->image = implode(',', array_filter($images)); // Remove empty values and implode
            $offerPackage->save();
            
            // Prepare the path for deletion
            $imagePath = public_path('assets/offer/' . $imageName);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
            
            return response()->json(['success' => true, 'message' => 'Image deleted successfully.']);
        }
        
        return response()->json(['success' => false, 'message' => 'No images found to delete.']);
    }
    
    
    
    public function offerPackageList()
    {
        $offerPackages = OfferPackage::all();
        return view('offerPackage.index', compact('offerPackages'));
    }
}
