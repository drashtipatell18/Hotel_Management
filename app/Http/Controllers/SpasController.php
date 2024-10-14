<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spa;
use App\Http\Controllers\Controller;

class SpasController extends Controller
{
     public function spaList()
     {
        $spas = Spa::all();
        return view('spa.view_spa', compact('spas'));
     }
     public function spaCreate()
     {
        return view('spa.add_spa');
     }
     public function spaStore(Request $request)
     {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'image' => 'required',
            'price' => 'required',

        ]);

        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);


        Spa::create([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'image' => $imageName,
            'price' => $request->price,
        ]);
        return redirect()->route('spa/list')->with('success', 'Spa created successfully');

     }

     public function spaEdit($id)
     {
        $spa = Spa::find($id);
        return view('spa.edit_spa', compact('spa'));
     }

     public function spaUpdate(Request $request, $id)
     {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'image' => 'required',
            'price' => 'required',
        ]);

        $spa = Spa::find($id);
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);

        $spa->update([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'image' => $imageName,
            'price' => $request->price,
        ]);
        return redirect()->route('spa/list')->with('success', 'Spa updated successfully');
     }

     public function spaDelete($id)
     {
        $spa = Spa::find($id);
        $spa->delete();
        return redirect()->route('spa/list')->with('success', 'Spa deleted successfully');
     }

}
