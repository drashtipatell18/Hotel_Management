<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Location;
class ContactController extends Controller
{
    public function ContactList()
    {
        $contacts = Contacts::all();
        return view('contact.contactlist',compact('contacts'));
    }

    public function ContactDelete($id)
    {
        try {
            $contacts = Contacts::find($id);
            if ($contacts) {
                $contacts->delete();
                Toastr::success('Contact deleted successfully :)', 'Success');
                return redirect()->route('contact/list');
            } else {
                Toastr::error('Contact not found :)', 'Error');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            Toastr::error('Contact deletion failed :)', 'Error');
            return redirect()->back();
        }
    }
    public function contactus()
    {
        $location = Location::first();
        $address = $location->address;
        return view('frontend.contact', compact('location', 'address'));
    }

    public function contactusStore(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Store the data in the contacts table
        $contactUs = new Contacts;
        $contactUs->name = $request->input('name');
        $contactUs->email = $request->input('subject');
        $contactUs->subject = $request->input('subject');
        $contactUs->message = $request->input('message');
        $contactUs->save();
        return redirect()->route('contact-us')->with('success', 'Your message has been sent successfully!');
    }

}
