<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdditionalPrefrence;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use DB;

class AdditionalFilterController extends Controller
{
    public function additionalFilter()
    {
        return view('filter/additionalfilter');
    }
    public function storeAdditionalFilter(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable'
        ]);
        try {
            $additionalPrefrenceFilter = AdditionalPrefrence::create([
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
                $additionalPrefrenceFilter->update([
                    'image' => $imageNamesString
                ]);
            }
            Toastr::success('Create Additional Prefrence successfully :)', 'Success');
            return redirect()->route('additionalFilter/list');
        } catch (\Exception $e) {
         
            Toastr::error('Add Additional Preference failed :)', 'Error');
            return redirect()->back();
        }
    }
    public function additionalFilterLisnt()
    {
        $listAllAdditionalPrefrence = AdditionalPrefrence::all();
        return view('filter/list_additionalfilter',compact('listAllAdditionalPrefrence'));
    }
    public function additionalEdit($id)
    {
        $additionalFilter = AdditionalPrefrence::find($id);
        $existingImages = $additionalFilter->images;
        return view('filter/additionalfilter', compact('additionalFilter', 'existingImages'));
    }

    public function additionalUpdate(Request $request, $id)
    {
        try {
            $additionalFilter = AdditionalPrefrence::findOrFail($id);
            $additionalFilter->name = $request->input('name');
            $existingImages = explode(',', $additionalFilter->image);
    
            if ($request->hasFile('image')) {
                // Store new images
                foreach ($request->file('image') as $image) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('assets/upload/'), $imageName);
                    $existingImages[] = $imageName;
                }
            }
    
            $additionalFilter->image = implode(',', $existingImages);
            $additionalFilter->save();
        
            Toastr::success('Additional Preference updated successfully :)', 'Success');
            return redirect()->route('additionalFilter/list');
        } catch (\Exception $e) {
            // Log the exception for debugging
            \Log::error('Update Additional Preference failed: ' . $e->getMessage());
            Toastr::error('Update Additional Preference failed :)', 'Error');
            return redirect()->back();
        }
    }

    public function additionalDelete($id)
    {
        DB::beginTransaction();
        try {
            $additionalFilter = AdditionalPrefrence::findOrFail($id);
            $additionalFilter->delete();
            DB::commit();
            Toastr::success('Additional Prefrence deleted successfully :)', 'Success');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Failed to delete Additional Prefrence :(', 'Error');
        }
        return redirect()->route('additionalFilter/list');
    }
    
    public function deleteImage(Request $request, $id)
    {
        // Find the SmokingPrefrence record by ID
        $additionalFilter = AdditionalPrefrence::findOrFail($id);
        
        // Get the image file name
        $imageFileName = $request->input('image_file_name');
        
        // Construct the file path
        $imagePath = public_path('assets/upload/' . $imageFileName);
        
        // Remove the image file name from the image field
        $imageFiles = explode(',', $additionalFilter->image);
        $imageFiles = array_filter($imageFiles, function($file) use ($imageFileName) {
            return trim($file) !== $imageFileName;
        });
        $additionalFilter->image = implode(',', $imageFiles);
        $additionalFilter->save();
        
        // Check if the file exists and delete it
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        
        // Return a JSON response indicating success
        return response()->json(['success' => true], 200);
    }

}
