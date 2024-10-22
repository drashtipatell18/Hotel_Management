<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spa;
use App\Http\Controllers\Controller;

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

        $images = $request->file('image'); // Change to handle multiple images
        $imagePaths = []; // Array to store the image paths

        // Check if images are uploaded
        if ($images) {
            foreach ($images as $image) {
                $imageName = time() . uniqid() . '.' . $image->getClientOriginalExtension(); // Unique name for each image
                $image->move(public_path('/images'), $imageName); // Ensure the path is correct
                $imagePaths[] = $imageName; // Store the image name
            }
        }

        // Check if Spa creation is successful
        $spa = Spa::create([
            'category' => $request->input('category'),
            'description' => $request->input('description'),
            'image' => implode(',', $imagePaths),
            'price' => $request->input('price'),
        ]);

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
        $spa = Spa::find($id);
        if (!$spa) {
            return redirect()->back()->with('error', 'Spa not found.');
        }

        // Handle images
        $images = $request->file('image');
        $existingImageNames = explode(',', $spa->image) ?? [];
        $imageNames = $existingImageNames;

        if ($images) {
            foreach ($images as $image) {
                $imageName = time() . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/images'), $imageName); // Ensure the path is correct
                $imageNames[] = $imageName;
            }
        }

        if ($request->has('remove_images')) {
            $imagesToRemove = $request->input('remove_images');
            foreach ($imagesToRemove as $imageToRemove) {
                $filePath = public_path('/images/' . $imageToRemove); // Ensure this points to a file
                if (file_exists($filePath) && is_file($filePath)) { // Check if it's a file
                    unlink($filePath); // Only unlink if it's a file
                }
                $imageNames = array_diff($imageNames, [$imageToRemove]);
            }
        }

        // Update spa details
        $spa->category = $request->input('category');
        $spa->description = $request->input('description');
        $spa->image = implode(',', $imageNames);
        $spa->price = $request->input('price');

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

}
