<?php

namespace App\Http\Controllers;

use App\Models\OfferPackage;
use Illuminate\Http\Request;
use App\Models\Hotel;

class OffersPackageController extends Controller
{
    public function offerPackageCreate()
    {
        $hotels = Hotel::pluck('name', 'id');
        return view('offerPackage.create', compact('hotels'));
    }

    public function offerPackageStore(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'discount_type' => 'required',
            'discount_value' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'is_active' => 'required',
        ]);
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);

        OfferPackage::create(
            [
                'hotel_id' => $request->input('hotel_id'),
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'image' => $imageName,
                'discount_type' => $request->input('discount_type'),
                'discount_value' => $request->input('discount_value'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'is_active' => $request->input('is_active') === 'on' ? 1 : 0,
            ]
        );
        return redirect()->route('offer/package/list')->with('success', 'Offer Package created successfully');
    }

    public function offerPackageEdit($id)
    {
        $offerPackage = OfferPackage::find($id);
        $hotels = Hotel::pluck('name', 'id');
        return view('offerPackage.edit', compact('offerPackage', 'hotels'));
    }

    public function offerPackageUpdate(Request $request, $id)
    {
        // $request->validate([
        //     'hotel_id' => 'required',
        //     'title' => 'required',
        //     'description' => 'required',
        //     'image' => 'required',
        //     'discount_type' => 'required',
        //     'discount_value' => 'required',
        //     'start_date' => 'required',
        //     'end_date' => 'required',
        //     'is_active' => 'required',
        // ]);
        $offerPackage = OfferPackage::find($id);
        
        $imageName = $offerPackage->image; // Initialize with existing image name

        $image = $request->file('image');
        if ($image) {
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }
        $offerPackage->update(
            [
                'hotel_id' => $request->input('hotel_id'),
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'image' => $imageName,
                'discount_type' => $request->input('discount_type'),
                'discount_value' => $request->input('discount_value'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'is_active' => $request->input('is_active') === 'on' ? 1 : 0,
            ]
        );
        return redirect()->route('offer/package/list')->with('success', 'Offer Package updated successfully');
    }

    public function offerPackageDelete($id)
    {
        $offerPackage = OfferPackage::find($id);
        $offerPackage->delete();
        return redirect()->route('offer/package/list')->with('success', 'Offer Package deleted successfully');
    }

    public function offerPackageList()
    {
        $offerPackages = OfferPackage::all();
        return view('offerPackage.index', compact('offerPackages'));
    }
}
