<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SmokingPrefrence;
use Brian2694\Toastr\Facades\Toastr;

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
    
}
