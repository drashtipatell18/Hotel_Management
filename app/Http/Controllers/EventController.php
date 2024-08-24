<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Models\Event;
use Brian2694\Toastr\Facades\Toastr;

class EventController extends Controller
{
    public function eventCreate()
    {
        $hotels = Hotel::all();
        return view('events/add_event',compact('hotels'));
    }
    public function eventStore(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required',
            'event_name' => 'required|string|max:255',
            'event_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'start_date' => 'required|date',
            'start_time' => 'required',
            'end_date' => 'required|date|after_or_equal:start_date',
            'end_time' => 'required',
            'description' => 'nullable|string',
        ]);

        $filename = null;
        if ($request->hasFile('event_image')) {
            $photo = $request->file('event_image');
            $filename = time() . '_' . $photo->getClientOriginalName(); // Use time to ensure unique names
            $photo->move(public_path('assets/upload'), $filename); // Store file in the specified directory
        }

        Event::create([
            'hotel_id' => $request->input('hotel_id'),
            'event_name' => $request->input('event_name'),
            'event_image' => $filename,
            'start_date' => $request->input('start_date'),
            'start_time' => $request->input('start_time'),
            'end_date' => $request->input('end_date'),
            'end_time' => $request->input('end_time'),
            'total_hours' => $request->input('total_hours'),
            'description' => $request->input('description'),
        ]);
        Toastr::success('Event created successfully :)', 'Success');
        return redirect()->route('event/list');

    }
    public function eventList()
    {
        $event = Event::all();
        return view('events.view_event',compact('event'));
    }
    public function eventEdit($id)
    {
        $event = Event::find($id);
        $hotels = Hotel::all();
        return view('events/add_event', compact('event','hotels'));
    }
    public function eventUpdate(Request $request, $id)
    {
        $request->validate([
            'hotel_id' => 'required',
            'event_name' => 'required|string|max:255',
            'event_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'start_date' => 'required|date',
            'start_time' => 'required',
            'end_date' => 'required|date|after_or_equal:start_date',
            'end_time' => 'required',
            'description' => 'nullable|string',
        ]);

        $event = Event::find($id);

        if (!$event) {
            Toastr::error('Event not found :)', 'Error');
            return redirect()->route('event/list');
        }

        try {
            $filename = $event->event_image; // Preserve the old image if no new image is uploaded

            if ($request->hasFile('event_image')) {
                // Delete old image if exists
                if ($filename && file_exists(public_path('assets/upload/' . $filename))) {
                    unlink(public_path('assets/upload/' . $filename));
                }

                $photo = $request->file('event_image');
                $filename = time() . '_' . $photo->getClientOriginalName(); // Use time to ensure unique names
                $photo->move(public_path('assets/upload'), $filename); // Store new file in the specified directory
            }

            $event->update([
                'hotel_id' => $request->input('hotel_id'),
                'event_name' => $request->input('event_name'),
                'event_image' => $filename,
                'start_date' => $request->input('start_date'),
                'start_time' => $request->input('start_time'),
                'end_date' => $request->input('end_date'),
                'end_time' => $request->input('end_time'),
                'total_hours' => $request->input('total_hours'),
                'description' => $request->input('description'),
            ]);

            Toastr::success('Event updated successfully :)', 'Success');
            return redirect()->route('event/list');
        } catch (\Exception $e) {
            Toastr::error('Event update failed :)', 'Error');
            return redirect()->back()->withInput();
        }
    }
    public function eventDelete($id)
    {
        try {
            $event = Event::find($id);
            if ($event) {
                $event->delete();
                Toastr::success('Event deleted successfully :)', 'Success');
                return redirect()->route('event/list');
            } else {
                Toastr::error('Event not found :)', 'Error');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            Toastr::error('Event deletion failed :)', 'Error');
            return redirect()->back();
        }
    }
}
