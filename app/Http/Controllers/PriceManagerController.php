<?php

namespace App\Http\Controllers;

use App\Models\PriceManger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;

class PriceManagerController extends Controller
{
    public function priceManagerCreate()
    {
        $roomtypes = DB::table('room_types')->get();
        $priceManagers = PriceManger::with('roomType')->get();
        return view('pricemanager/add_pricemanager', compact('roomtypes','priceManagers'));
    }

    public function priceManagerStore(Request $request)
    {
        $validatedData = $request->validate([
            'room_type_id' => 'required|integer|exists:room_types,id',
            'monday_price' => 'required|numeric|min:0',
            'tuesday_price' => 'required|numeric|min:0',
            'wednesday_price' => 'required|numeric|min:0',
            'thursday_price' => 'required|numeric|min:0',
            'friday_price' => 'required|numeric|min:0',
            'saturday_price' => 'required|numeric|min:0',
            'sunday_price' => 'required|numeric|min:0',
        ]);

        if ($request->has('id')) {
            $priceManager = PriceManger::find($request->id); // Use find instead of findOrFail
            if ($priceManager) {
                $priceManager->update($validatedData);
                Toastr::success('PriceManager updated successfully :)', 'Success');
                // return redirect()->route('pricemanager/add');
            } else {
                return redirect()->back()->withErrors(['error' => 'Price Manager not found.']);
            }
        } else {
            PriceManger::create($validatedData);
            Toastr::success('PriceManager created successfully :)', 'Success');

        }

        return redirect()->back();
    }


    public function priceManagerEdit($id)
    {
        $priceManager = PriceManger::find($id);
        $roomtypes = DB::table('room_types')->get();
        $priceManagers = PriceManger::with('roomType')->get();
        return view('pricemanager/add_pricemanager', compact('priceManager', 'roomtypes', 'priceManagers'));
    }
    public function pricemanagerDelete($id)
    {
        $priceManager = PriceManger::find($id);
        if ($priceManager) {
            $priceManager->delete();
            return redirect()->back()->with('success', 'Price Manager deleted successfully.');
        } else {
            return redirect()->back()->withErrors(['error' => 'Price Manager not found.']);
        }
    }

}
