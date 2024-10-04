<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facilities;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use File;


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
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
        ]);

        try {
            $imagePaths = []; // Array to store the image paths

            // Check if images are uploaded
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    $imageName = time().'_'.$image->getClientOriginalName();
                    $image->move(public_path('/assets/facilities/'), $imageName);
                    $imagePaths[] = $imageName; // Store the image name
                }
            }

            // Create a new Facilities record
            $facilities = new Facilities;
            $facilities->name = $request->input('name');
            $facilities->image = implode(',', $imagePaths); // Store paths as a comma-separated string
            $facilities->title = $request->input('title');
            $facilities->description = $request->input('description');
            $facilities->save();

            return redirect()->route('facilities/list')
                ->with('success', 'Facilities added successfully!');
        } catch (\Exception $e) {
            Log::error('Error saving facilities: ' . $e->getMessage());
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
        // Validate request input
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255', // Make sure to validate the title
            'description' => 'nullable|string',
            'image' => 'nullable|array',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $facilities = Facilities::findOrFail($id);
            $facilities->name = $request->input('name');
            $facilities->title = $request->input('title');
            $facilities->description = $request->input('description');

            // Handle multiple images
            $imagePaths = [];
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('/assets/facilities/'), $imageName);
                    $imagePaths[] = $imageName;
                }

                // If there are existing images, merge them with the new ones
                if (!empty($facilities->image)) {
                    $existingImages = explode(',', $facilities->image);
                    $allImages = array_merge($existingImages, $imagePaths);
                } else {
                    $allImages = $imagePaths;
                }

                // Remove empty values and ensure no extra commas
                $facilities->image = implode(',', array_filter($allImages, 'trim'));
            }

            $facilities->save();
            DB::commit();
            Toastr::success('Facilities updated successfully :)', 'Success');
            return redirect()->route('facilities/list');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error updating facilities: ' . $e->getMessage());
            Toastr::error('Facilities update failed :)', 'Error');
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

    public function deleteImage(Request $request, $id)
    {
        // Find the Facilities record by ID
        $facilities = Facilities::findOrFail($id);
        
        // Get the image file name to be deleted
        $imageFileName = $request->input('image_file_name');
        
        // Construct the file path
        $imagePath = public_path('assets/facilities/' . $imageFileName);
        
        // Split the image field into an array of image file names
        $imageFiles = explode(',', $facilities->image);
        
        // Remove the image file name from the array
        $imageFiles = array_filter($imageFiles, function($file) use ($imageFileName) {
            return trim($file) !== $imageFileName && !empty(trim($file));
        });
        
        // Rebuild the image string without leading/trailing commas
        $facilities->image = implode(',', array_map('trim', $imageFiles));
        
        // Save the updated Facilities record
        $facilities->save();
        
        // Check if the file exists and delete it
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        
        // Return a JSON response indicating success
        return response()->json(['success' => true], 200);
    }
    
    

    

}
