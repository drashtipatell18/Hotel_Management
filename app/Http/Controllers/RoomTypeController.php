<?php

namespace App\Http\Controllers;

use App\Models\Amenities;
use App\Models\PriceManger;
use App\Models\RoomTypeImage;
use Illuminate\Http\Request;
use App\Models\RoomTypes;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class RoomTypeController extends Controller
{
    // public function roomtypeCreate($id)
    // {
    //     $roomtypes = null;
    //     $roomtypes = RoomTypes::with('images')->where('id', $id)->firstOrFail();
    //     $amenities = Amenities::all();
    //     return view('room_types/add_room_typs',compact('amenities','roomtypes'));
    // }
    public function roomtypeCreate()
    {
        $amenities = Amenities::all();
        return view('room_types/add_room_typs',compact('amenities'));
    }
    public function roomtypeStore(Request $request)
    {
        $request->validate([
            'room_name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            // 'extra_bed' => 'required',
            // 'per_extra_bed_price' => 'required',
            // 'extra_bed_quantity' => 'required',
            'amenities_id' => 'required|array',
            'amenities_id.*' => 'exists:amenities,id',
            'room_image' => 'required',
            'description' => 'required|nullable|string',
        ]);

        try{
            $roomTypes = RoomTypes::create([
                'room_name' => $request->input('room_name'),
                'capacity' => $request->input('capacity'),
                'extra_bed' => $request->has('extra_bed') ? 1 : 0,
                'per_extra_bed_price'=> $request->input('per_extra_bed_price'),
                'extra_bed_quantity' => $request->input('extra_bed_quantity', 0),
                'amenities_id' => implode(",", $request->input('amenities_id')),
                'extra_bed_price' => $request->input('extra_bed_price'),
                'description' => $request->input('description'),
                'base_price' => $request->input('base_price'),
            ]);

            if ($request->hasFile('room_image')) {
                foreach ($request->file('room_image') as $image) {
                    $imageName = time().'_'.$image->getClientOriginalName();
                    $image->move(public_path('/assets/upload/'), $imageName);

                    // Store image in hotel_image table
                    RoomTypeImage::create([
                        'roomType_id' => $roomTypes->id,
                        'room_image' => $imageName,
                    ]);
                }
            }

            Toastr::success('Create new room type successfully :)','Success');
            return redirect()->route('roomtype/list');
        }
        catch(\Exception $e) {
            Toastr::error('Add Room fail :)','Error');
            return redirect()->back();
        }


    }
    public function roomtypeList()
    {
        $roomTypes = RoomTypes::all();

        $amenities = Amenities::all();

        return view('room_types/listroomtype',compact('roomTypes','amenities'));
    }
    public function roomtypeEdit($id)
    {
        $roomtype = RoomTypes::find($id);
        $amenities = Amenities::all();
        return view('room_types/add_room_typs', compact('roomtype','amenities'));
    }
    public function roomtypeUpdate(Request $request, $id)
    {
        $request->validate([
            'room_name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'extra_bed_quantity' => 'nullable|required_if:extra_bed,1|integer|min:0',
            'amenities_id' => 'required|exists:amenities,id',
            'extra_bed_price' => 'required|numeric|min:0',
            'description' => 'nullable|string',

        ]);
        $roomType = RoomTypes::findOrFail($id);
        try{

            if ($request->hasFile('room_image')) {
                // Handle the new image upload
                foreach ($request->file('room_image') as $image) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('/assets/upload/'), $imageName);

                    // Store new image in room_type_image table
                    RoomTypeImage::create([
                        'roomType_id' => $roomType->id,
                        'room_image' => $imageName,
                    ]);
                }
            }

            $roomType->update([
                'room_name' => $request->input('room_name'),
                'capacity' => $request->input('capacity'),
                'extra_bed' => $request->has('extra_bed') ? 1 : 0,
                'per_extra_bed_price' => $request->input('per_extra_bed_price'),
                'extra_bed_quantity' => $request->input('extra_bed_quantity', 0),
                'amenities_id' => implode(",", $request->input('amenities_id')),
                'extra_bed_price' => $request->input('extra_bed_price'),
                'description' => $request->input('description'),
                'base_price' => $request->input('base_price'),
            ]);



            Toastr::success('Room type updated successfully :)','Success');
            return redirect()->route('roomtype/list');
        }
        catch(\Exception $e) {
            Toastr::error('Add Room Type fail :)','Error');
            return redirect()->back();
        }

    }
    public function roomtypeDelete($id)
    {
        DB::beginTransaction();
        try {
            $roomType = RoomTypes::findOrFail($id);
            $roomType->delete();
            DB::commit();
            Toastr::success('RoomType deleted successfully :)', 'Success');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Failed to delete roomType :(', 'Error');
        }
        return redirect()->route('roomtype/list');
    }
    public function updateStatus(Request $request)
    {
        $roomType = RoomTypes::find($request->roomtype_id);
        $roomType->status = $request->status;
        $roomType->save();

        return response()->json(['status' => 'success', 'new_status' => $roomType->status]);
    }
    public function dailyPriceList()
    {
        $priceManagers = PriceManger::with('roomType')->get();
        $startOfWeek = Carbon::now()->startOfWeek(); // Start of current week
        $dates = [
            'Monday' => $startOfWeek->format('d-m-Y'),
            'Tuesday' => $startOfWeek->addDay()->format('d-m-Y'),
            'Wednesday' => $startOfWeek->addDay()->format('d-m-Y'),
            'Thursday' => $startOfWeek->addDay()->format('d-m-Y'),
            'Friday' => $startOfWeek->addDay()->format('d-m-Y'),
            'Saturday' => $startOfWeek->addDay()->format('d-m-Y'),
            'Sunday' => $startOfWeek->addDay()->format('d-m-Y')
        ];

        return view('room_types/list_dailyprice',compact('priceManagers','dates'));
    }


    public function deleteImage($id)
    {
        $image = RoomTypeImage::findOrFail($id);
        $imagePath = public_path('assets/upload/' . $image->room_image);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        // Delete the image record from the database
        $image->delete();

        return response()->json(['success' => true]);
    }
}
