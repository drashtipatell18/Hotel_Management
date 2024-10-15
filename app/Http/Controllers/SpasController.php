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
        $request->validate([
            'category' => 'required',
            'description' => 'required',
            'image' => 'required',
            'price' => 'required',

        ]);

        try {
            $imagePaths = []; // Array to store the image paths

            // Check if images are uploaded
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    $imageName = time().'_'.$image->getClientOriginalName();
                    $image->move(public_path('/assets/spas/'), $imageName);
                    $imagePaths[] = $imageName; // Store the image name
                }
            }

            // Create a new Facilities record
            $spas = new Spa;
            $spas->category = $request->input('category');
            $spas->description = $request->input('description');
            $spas->image = implode(',', $imagePaths); // Store paths as a comma-separated string
            $spas->price = $request->input('price');
            $spas->save();

            return redirect()->route('spa/list')
                ->with('success', 'Spa added successfully!');
        } catch (\Exception $e) {
            Log::error('Error saving spa: ' . $e->getMessage());
            return redirect()->route('spa/list')
                ->with('error', 'There was a problem adding the spa.');
        }
    }

     public function spaEdit($id)
     {
        $spa = Spa::find($id);
        return view('spa.edit_spa', compact('spa'));
     }

     public function spaUpdate(Request $request, $id)
     {
        $request->validate([
            'category' => 'required',
            'description' => 'required',
            'image' => 'required',
            'price' => 'required',
        ]);

        try {
            $imagePaths = []; // Array to store the image paths

            // Check if images are uploaded
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    $imageName = time().'_'.$image->getClientOriginalName();
                    $image->move(public_path('/assets/spas/'), $imageName);
                    $imagePaths[] = $imageName; // Store the image name
                }
            }
            $spa = Spa::find($id);
            $spa->category = $request->input('category');
            $spa->description = $request->input('description');
            $spa->image = implode(',', $imagePaths); // Store paths as a comma-separated string
            $spa->price = $request->input('price');
            $spa->save();
        } catch (\Exception $e) {
            Log::error('Error saving spa: ' . $e->getMessage());
            return redirect()->route('spa/list')
                ->with('error', 'There was a problem adding the spa.');
        }
        return redirect()->route('spa/list')->with('success', 'Spa updated successfully');
     }


     public function spaDelete($id)
     {
        $spa = Spa::find($id);
        $spa->delete();
        return redirect()->route('spa/list')->with('success', 'Spa deleted successfully');
     }

}
