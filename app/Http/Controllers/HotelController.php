<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use App\Models\HotelImages;
use Illuminate\Support\Facades\File;

class HotelController extends Controller
{
    public function hotelCreate()
    {
        return view('hotel.add');
    }
    public function hotelStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required',
            'phone' => 'required|integer|digits:10',
            'stars' => 'required',
            'address' => 'required'
        ]);

        try {
            // Create a new hotel record
            $hotel = Hotel::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'stars' => $request->input('stars'),
                'address' => $request->input('address'),
            ]);

            if ($request->hasFile('hotel_image')) {
                foreach ($request->file('hotel_image') as $image) {
                    $imageName = time().'_'.$image->getClientOriginalName();
                    $image->move(public_path('/assets/hotel/'), $imageName);

                    // Store image in hotel_image table
                    HotelImages::create([
                        'hotel_id' => $hotel->id,
                        'hotel_image' => $imageName,
                    ]);
                }
            }

            Toastr::success('Hotel created successfully :)', 'Success');
            return redirect()->route('hotel/list'); //
        }
        catch(\Exception $e) {
            Toastr::error('Add Hotel fail :)','Error');
            return redirect()->back();
        }



    }
    public function hotelList()
    {
        $allHotelList = Hotel::with('images')->get();
        return view('hotel.listhotel',compact('allHotelList'));
    }
    public function hotelEdit($id)
    {
        $hotelEdit = Hotel::with('images')->where('id', $id)->firstOrFail();
        return view('hotel.hoteledit',compact('hotelEdit'));
    }
    public function hotelUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|integer|digits:10',
            'stars' => 'required|integer',
            'address' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $hotel = Hotel::findOrFail($id);

            // Update other fields
            $hotel->name = $request->input('name');
            $hotel->email = $request->input('email');
            $hotel->phone = $request->input('phone');
            $hotel->stars = $request->input('stars');
            $hotel->address = $request->input('address');
            $hotel->save();

            if ($request->hasFile('hotel_image')) {
                foreach ($request->file('hotel_image') as $image) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('/assets/hotel/'), $imageName);

                    // Store new image in hotel_image table
                    HotelImages::create([
                        'hotel_id' => $hotel->id,
                        'hotel_image' => $imageName,
                    ]);
                }
            }

            DB::commit();
            Toastr::success('Hotel updated successfully :)', 'Success');
            return redirect()->route('hotel/list');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Update hotel failed :)', 'Error');
            return redirect()->back()->withInput();
        }
    }
    public function hotelDelete(Request $request)
    {
        try {
            $hotel = Hotel::find($request->id);
            if ($hotel) {
                $hotel->status = 'inactive';
                $hotel->deleted_at = now();
                $hotel->save();
                Toastr::success('Hotel deleted successfully :)', 'Success');
            } else {
                Toastr::error('Hotel not found :)', 'Error');
            }
            return redirect()->back();

        } catch(\Exception $e) {
            Toastr::error('Hotel delete failed :)', 'Error');
            return redirect()->back();
        }
    }
    public function updateStatus(Request $request)
    {
        $hotel = Hotel::find($request->hotel_id);
        $hotel->status = $request->status;
        $hotel->save();

        return response()->json(['status' => 'success', 'new_status' => $hotel->status]);
    }

    public function deleteImage($id)
    {
        $image = HotelImages::findOrFail($id);
        $imagePath = public_path('assets/hotel/' . $image->hotel_image);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        // Delete the image record from the database
        $image->delete();

        return response()->json(['success' => true]);
    }


}
