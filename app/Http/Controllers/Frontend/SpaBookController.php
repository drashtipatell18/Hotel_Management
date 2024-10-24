<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Spa;
use App\Models\SpaCheckOut;
use App\Models\SpaBookknow;
class SpaBookController extends Controller
{
    public function spabook()
    {
        $spas = Spa::all();
        return view('frontend.spabook', compact('spas'));
    }
    public function spabookKnow($id)
    {
        $spas = Spa::find($id);
        return view('frontend.spabooknow', compact('spas'));
    }
    public function spabooknowStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'checkin' => 'required',
            'time' => 'required',
            'technician' => 'required',
            'person' => 'required',
            'total_price' => 'required',
            'price' => 'required',
            'spa_id' => 'required',
        ]);
        SpaBookknow::create([
            'checkin' => $request->input('checkin'),
            'time' => $request->input('time'),
            'technician' => $request->input('technician'),
            'person' => $request->input('person'),
            'total_price' => $request->input('total_price'),
            'price' => $request->input('price'),
            'spa_id' => $request->input('spa_id'),
        ]);
        return redirect()->route('spacheckout')->with('success', 'Booking confirmed successfully!');
    }
    public function spacheckout()
    {
        return view('frontend.spacheckout');
    }
    public function spacheckoutStore(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'nationality' => 'required',
            'additional_info' => 'required',
            'cardholder_name' => 'required',
            'card_number' => 'required',
            'expiry_date' => 'required',
            'cvv' => 'required',

        ]);

        SpaCheckOut::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'nationality' => $request->input('nationality'),
            'additional_info' => $request->input('additional_info'),
            'cardholder_name' => $request->input('cardholder_name'),
            'card_number' => $request->card_number,
            'expiry_date' => $request->input('expiry_date'),
            'cvv' => $request->input('cvv'),
            'total_price' => $request->input('total_price'),
        ]);

        return redirect()->route('spabook')->with('success', 'Booking confirmed successfully!');
    }
}
