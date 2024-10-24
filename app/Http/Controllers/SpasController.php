<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spa;
use App\Http\Controllers\Controller;
use DB;
use File;

class SpasController extends Controller
{
     public function spaList()
     {
        $spas = Spa::all();
        return view('spa.view_spa', compact('spas'));
     }
     public function spaCreate()
     {
        return view('spa.add_spa');
     }

     public function spaStore(Request $request)
     {
        // Uncommenting validation to ensure required fields are checked
        $request->validate([
            'category' => 'required',
            'description' => 'required',
            'image' => 'required|array', // Ensure 'image' is an array
            'image.*' => 'image|mimes:jpeg,png,jpg|max:2048', // Validate each image
            'price' => 'required|numeric', // Ensure price is numeric
        ]);

        $spa = new Spa;
        $spa->category = $request->category;
        $spa->description = $request->description;
        $spa->price = $request->price;
        $imageNames = [];

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                // Generate a unique image name
                $imageName = time() . '_' . $image->getClientOriginalName();
                // Move the image to the desired folder
                $image->move(public_path('/assets/spa/'), $imageName);
                // Add the image name to the array
                $imageNames[] = $imageName;
            }

            // Convert the array to a comma-separated string
            $spa->image = implode(',', $imageNames);
        }
        $spa->save();
        if ($spa) {
            return redirect()->route('spa/list')
                ->with('success', 'Spa added successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to add spa. Please try again.');
        }
     }

     public function spaEdit($id)
     {
        $spa = Spa::find($id);
        return view('spa.edit_spa', compact('spa'));
     }

     public function spaUpdate(Request $request, $id)
     {
         $spa = Spa::findOrFail($id);
         if (!$spa) {
             return redirect()->back()->with('error', 'Spa not found.');
         }
     
         // Update spa details
         $spa->category = $request->category;
         $spa->description = $request->description;
         $spa->price = $request->input('price');
     
         // Existing images (filter empty values)
         $imageNames = array_filter(explode(',', $spa->image));
     
         if ($request->hasFile('image')) {
             foreach ($request->file('image') as $image) {
                 // Generate a unique image name
                 $imageName = time() . '_' . $image->getClientOriginalName();
                 // Move the image to the desired folder
                 $image->move(public_path('/assets/spa/'), $imageName);
                 // Add the new image name to the array
                 $imageNames[] = $imageName;
             }
         }
     
         // Ensure no duplicate image names and filter empty values
         $spa->image = implode(',', array_unique(array_filter($imageNames)));
         
         // Save the updated spa
         if ($spa->save()) {
             return redirect()->route('spa/list')->with('success', 'Spa updated successfully');
         } else {
             return redirect()->back()->with('error', 'Failed to update spa. Please try again.');
         }
     }
     

     public function spaDelete($id)
     {
        $spa = Spa::find($id);
        $spa->delete();
        return redirect()->route('spa/list')->with('success', 'Spa deleted successfully');
     }

     public function deleteImage($id)
     {
         // Find the Spa
         $spa = Spa::findOrFail($id);
     
         // Split the images into an array
         $images = array_filter(explode(',', $spa->image)); // Filter out any empty values
     
         // Check if there are images to delete
         if (!empty($images)) {
             // Get the first image name to delete
             $imageName = array_shift($images); // Remove the first image from the array
     
             // Update the images field in the database, filter empty values to avoid trailing commas
             $spa->image = count($images) > 0 ? implode(',', array_filter($images)) : null;
             $spa->save();
     
             // Prepare the path for deletion
             $imagePath = public_path('assets/spa/' . $imageName);
             if (File::exists($imagePath)) {
                 File::delete($imagePath);
             }
     
             return response()->json(['success' => true, 'message' => 'Image deleted successfully.']);
         }
     
         return response()->json(['success' => false, 'message' => 'No images found to delete.']);
     }
     


}
