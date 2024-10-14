<?php

namespace App\Http\Controllers;

use App\Models\HallType;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;    

class HallTypeController extends Controller
{
    public function halltypeCreate()
    {
        return view('halltypes/add_halltypes');
    }
    public function halltypeStore(Request $request)
    {
        $request->validate([
            'halltype_name' => 'required',
            'halltype_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'halltype_capacity' => 'required',
            'base_price' => 'required|integer',
            'description' => 'nullable',
        ]);

        $filename = null;
        if ($request->hasFile('halltype_image')) {
            $photo = $request->file('halltype_image');
            $filename = time() . '_' . $photo->getClientOriginalName(); // Use time to ensure unique names
            $photo->move(public_path('assets/upload'), $filename); // Store file in the specified directory
        }

        HallType::create([
            'halltype_name' => $request->input('halltype_name'),
            'halltype_image' => $filename,
            'halltype_capacity' => $request->input('halltype_capacity'),
            'base_price' => $request->input('base_price'),
            'description' => $request->input('description')
        ]);
        Toastr::success('HallType created successfully :)', 'Success');
        return redirect()->route('halltype/list');

    }
    public function halltypeList()
    {
        $halltypes = HallType::all();
        return view('halltypes/view_halltypes',compact('halltypes'));
    }
    public function halltypeEdit($id)
    {
        $halltype = HallType::find($id);
        return view('halltypes/add_halltypes', compact('halltype'));
    }
    public function halltypeUpdate(Request $request, $id)
    {
        $request->validate([
            'halltype_name' => 'required',
            'halltype_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'halltype_capacity' => 'required',
            'base_price' => 'required|integer',
            'description' => 'nullable',
        ]);

        $halltype = HallType::find($id);

        if (!$halltype) {
            Toastr::error('Hall Type not found :)', 'Error');
            return redirect()->route('halltype/list');
        }

        try {
            $filename = $halltype->halltype_image; // Preserve the old image if no new image is uploaded

            if ($request->hasFile('halltype_image')) {
                // Delete old image if exists
                if ($filename && file_exists(public_path('assets/upload/' . $filename))) {
                    unlink(public_path('assets/upload/' . $filename));
                }

                $photo = $request->file('halltype_image');
                $filename = time() . '_' . $photo->getClientOriginalName(); // Use time to ensure unique names
                $photo->move(public_path('assets/upload'), $filename); // Store new file in the specified directory
            }

            $halltype->update([
                'halltype_name' => $request->input('halltype_name'),
                'halltype_image' => $filename,
                'halltype_capacity' => $request->input('halltype_capacity'),
                'base_price' => $request->input('base_price'),
                'description' => $request->input('description'),
            ]);

            Toastr::success('Hall Type updated successfully :)', 'Success');
            return redirect()->route('halltype/list');
        } catch (\Exception $e) {
            Toastr::error('Hall Type update failed :)', 'Error');
            return redirect()->back()->withInput();
        }
    }
    public function halltypeDelete($id)
    {
        try {
            $halltype = HallType::find($id);
            if ($halltype) {
                $halltype->delete();
                Toastr::success('Hall type deleted successfully :)', 'Success');
                return redirect()->route('halltype/list');
            } else {
                Toastr::error('Hal,l Type not found :)', 'Error');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            Toastr::error('Hall Type deletion failed :)', 'Error');
            return redirect()->back();
        }
    }
    public function updateStatus(Request $request)
    {
        $halltype = HallType::find($request->halltype_id);
        $halltype->status = $request->status;
        $halltype->save();

        return response()->json(['status' => 'success', 'new_status' => $halltype->status]);
    }
}
