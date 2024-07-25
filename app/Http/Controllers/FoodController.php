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
            'description' => 'required|nullable|string',
        ]);
        try{
            Food::create([
                'food_name' => $request->food_name,
                'description' => $request->description,
            ]);
            Toastr::success('Food created successfully :)', 'Success');
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
        ]);

        try {
            $food = Food::find($id);
            if ($food) {
                $food->update([
                    'food_name' => $request->food_name,
                    'description' => $request->description,
                ]);
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
