<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

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

}
