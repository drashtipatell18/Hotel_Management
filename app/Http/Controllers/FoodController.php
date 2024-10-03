<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use Brian2694\Toastr\Facades\Toastr;

class FoodController extends Controller
{
    public function foodCreate()
    {
        return view('foods.add_food');
    }
    public function foodStore(Request $request)
    {
        $request->validate([
            'food_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'food_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);
        try{
            $file_name = null;
            if ($request->hasFile('food_image')) {
                $photo = $request->file('food_image');
                $file_name = time() . '_' . $photo->getClientOriginalName(); // Use time to ensure unique names
                $photo->move(public_path('assets/upload'), $file_name); // Store file in the specified directory
            }

            Food::create([
                'food_name' => $request->food_name,
                'description' => $request->description,
                'food_image' => $file_name,

            ]);
            Toastr::success('Food created successfully
            ', 'Success');
            return redirect()->route('food/list');
        }
        catch (\Exception $e) {
            Toastr::error('Food  failed :)', 'Error');
            return redirect()->back()->withInput();
        }
    }
    public function foodList()
    {
        $foods = Food::all();
        return view('foods.view_food',compact('foods'));
    }
    public function foodEdit($id)
    {
        $food = Food::find($id);
        return view('foods/add_food', compact('food'));
    }
    public function foodUpdate(Request $request, $id)
    {
        $request->validate([
            'food_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'food_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'

        ]);

        try {
            $food = Food::find($id);
            if ($food) {
                $updateData = [
                    'food_name' => $request->food_name,
                    'description' => $request->description,
                ];

                // Check if an image file is uploaded
                if ($request->hasFile('food_image')) {
                    $photo = $request->file('food_image');
                    $file_name = rand() . '.' . $photo->getClientOriginalExtension();
                    $photo->move(public_path('/assets/upload/'), $file_name);

                    // Add the image file name to updateData
                    $updateData['food_image'] = $file_name;
                }

                $food->update($updateData);

                Toastr::success('Food updated successfully :)', 'Success');
                return redirect()->route('food/list');
            } else {
                Toastr::error('Food not found :)', 'Error');
                return redirect()->back()->withInput();
            }
        } catch (\Exception $e) {
            Toastr::error('Food update failed :)', 'Error');
            return redirect()->back()->withInput();
        }
    }
    public function foodDelete($id)
    {
        try {
            $food = Food::find($id);
            if ($food) {
                $imagePath = public_path('assets/upload/') . $food->food_image;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $food->delete();
                Toastr::success('Food deleted successfully :)', 'Success');
                return redirect()->route('food/list');
            } else {
                Toastr::error('Food not found :)', 'Error');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            Toastr::error('Food deletion failed :)', 'Error');
            return redirect()->back();
        }
    }
}
