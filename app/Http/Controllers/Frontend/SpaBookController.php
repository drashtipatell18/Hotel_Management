<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Spa;
use App\Models\SpaCheckOut;
use App\Models\SpaBookknow;
use Illuminate\Support\Facades\Auth;
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
        $images = explode(',', $spas->image);
        $spaBookknow = $spas->spaBookknow;
        $spaCategory = $spas ? $spas->category : null;
        
        return view('frontend.spabooknow', compact('spas','images','spaCategory'));
    }
    public function spabooknowStore(Request $request,$id)
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
        $spa = Spa::find($id);
        $spaBookknow = SpaBookknow::create([
            'checkin' => $request->input('checkin'),
            'time' => $request->input('time'),
            'technician' => $request->input('technician'),
            'person' => $request->input('person'),
            'total_price' => $request->input('total_price'),
            'price' => $request->input('price'),
            'spa_id' => $request->input('spa_id'),
        ]);
        return redirect()->route('spacheckout',$spaBookknow->id)->with('success', 'Booking confirmed successfully!');
    }
    public function spacheckout($id)
    {
        $spaBookknow = SpaBookknow::with('spa')->find($id); // Updated to include spa relation
        $spa = $spaBookknow->spa; // Accessing the spa relation directly
        $spaCategory = $spa ? $spa->category : null;
        $firstImagePath = null;
        if ($spa && $spa->image) {
            $images = explode(',', $spa->image); // Split the string into an array
            $firstImagePath = trim($images[0]); // Get the first image and trim any whitespace
        }
      
        return view('frontend.spacheckout',compact('spa','firstImagePath','spaCategory','spaBookknow'));
    }
    public function spacheckoutStore(Request $request,$id)
    {
        // dd($id);
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
            'captcha' => 'required|captcha'

        ]);
        $spaBookknow = SpaBookknow::with('spa')->find($id); // Updated to include spa relation
        $spa = $spaBookknow->spa; // Accessing the spa relation directly

        $basePrice = $spaBookknow->total_price;
        $taxAmount = 100; // Assuming fixed tax for this example
        $totalPrice = $basePrice + $taxAmount;
        

        $spacheckout = SpaCheckOut::create([
            'user_id' => Auth::user()->id,
            'spa_id' => $spa->id,
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
            'total_price' => $totalPrice,
            'captcha' => $request->input('captcha'),
        ]);
       
        return redirect()->route('spabook')->with('success', 'Booking confirmed successfully!');
    }
}
