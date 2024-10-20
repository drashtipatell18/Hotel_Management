<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SmokingPrefrence;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use DB;

class FilterController extends Controller
{
    public function smokingFileter()
    {
        return view('filter/add_smoking');
    }
    public function storeSmoking(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable'
        ]);
    
        try {
            $smokingFilter = SmokingPrefrence::create([
                'name' => $request->input('name')
            ]);
    
            $imageNames = [];
    
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    $imageName = time().'_'.$image->getClientOriginalName();
                    $image->move(public_path('/assets/upload/'), $imageName);
                    $imageNames[] = $imageName;
                }
                $imageNamesString = implode(',', $imageNames);
                $smokingFilter->update([
                    'image' => $imageNamesString
                ]);
            }
            Toastr::success('Create Smoking Preference successfully :)', 'Success');
            return redirect()->route('smoking/list');
        } catch (\Exception $e) {
         
            Toastr::error('Add Smoking Preference failed :)', 'Error');
            return redirect()->back();
        }
    }

    public function SmokingList()
    {
        $listAllSmoking = SmokingPrefrence::all();
        return view('filter/list_smoking',compact('listAllSmoking'));
    }

    public function smokingEdit($id)
    {
        $smoking = SmokingPrefrence::find($id);
        $existingImages = $smoking->images;
        return view('filter/add_smoking', compact('smoking', 'existingImages'));
    }

    public function smokingUpdate(Request $request, $id)
    {
        try {
            $smokingFilter = SmokingPrefrence::findOrFail($id);
            $smokingFilter->name = $request->input('name');
            $existingImages = explode(',', $smokingFilter->image);
    
            if ($request->hasFile('image')) {
                // Store new images
                foreach ($request->file('image') as $image) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('assets/upload/'), $imageName);
                    $existingImages[] = $imageName;
                }
            }
    
            $smokingFilter->image = implode(',', $existingImages);
            $smokingFilter->save();
        
            Toastr::success('Smoking Preference updated successfully :)', 'Success');
            return redirect()->route('smoking/list');
        } catch (\Exception $e) {
            // Log the exception for debugging
            \Log::error('Update Smoking Preference failed: ' . $e->getMessage());
            Toastr::error('Update Smoking Preference failed :)', 'Error');
            return redirect()->back();
        }
    }
    
    public function smokingDelete($id)
    {
        DB::beginTransaction();
        try {
            $smoking = SmokingPrefrence::findOrFail($id);
            $smoking->delete();
            DB::commit();
            Toastr::success('Smoking Prefrence deleted successfully :)', 'Success');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Failed to delete roomType :(', 'Error');
        }
        return redirect()->route('smoking/list');
    }
    
    public function deleteImage(Request $request, $id)
    {
        // Find the SmokingPrefrence record by ID
        $smoking = SmokingPrefrence::findOrFail($id);
        
        // Get the image file name
        $imageFileName = $request->input('image_file_name');
        
        // Construct the file path
        $imagePath = public_path('assets/upload/' . $imageFileName);
        
        // Remove the image file name from the image field
        $imageFiles = explode(',', $smoking->image);
        $imageFiles = array_filter($imageFiles, function($file) use ($imageFileName) {
            return trim($file) !== $imageFileName;
        });
        $smoking->image = implode(',', $imageFiles);
        $smoking->save();
        
        // Check if the file exists and delete it
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        
        // Return a JSON response indicating success
        return response()->json(['success' => true], 200);
    }
}
