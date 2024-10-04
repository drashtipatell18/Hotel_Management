<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientReview;
use Brian2694\Toastr\Facades\Toastr;
use Log;
use DB;

class ClientReviewController extends Controller
{
    public function clientReviewCreate()
    {
        return view('clientReview/add');
    }

    public function clientReviewStore(Request $request)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
        ]);

        try {
            $imagePath = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/assets/upload/'), $imageName);
                $imagePath = $imageName;
            }

            // Create a new Amenity record
            $clientReview = new ClientReview;
            $clientReview->client_name = $request->input('client_name');
            $clientReview->image = $imagePath;
            $clientReview->description = $request->input('description');
            $clientReview->country = $request->input('country');
            $clientReview->state = $request->input('state');
            $clientReview->save();
            return redirect()->route('clientReview/list')
                ->with('success', 'Amenity added successfully!');
        } catch (\Exception $e) {
            Log::error('Error saving amenity: ' . $e->getMessage());
            return redirect()->route('clientReview/list')
                ->with('error', 'There was a problem adding the amenity.');
        }
    }

    public function clientReviewList()
    {
        $allClientReviewList = DB::table('client_reviews')->get();
        return view('clientReview.listclient_review',compact('allClientReviewList'));
    }
    public function clientReviewEdit($id)
    {
        $clientReviewList = ClientReview::where('id',$id)->first();
        // return view('clientReview.client_reviewedit',compact('clientReviewList'));
        return view('clientReview.client_reviewedit',['clientReviewList'=>$clientReviewList,'currentCountry'=>$clientReviewList->country,'currentState'=>$clientReviewList->state]);
    }

    public function clientReviewUpdate(Request $request, $id)
    {
      
            $clientReview = ClientReview::findOrFail($id);
            
            // Update the client review details
            $clientReview->client_name = $request->input('client_name');
    
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($clientReview->image) {
                    $oldImagePath = public_path('/assets/upload/' . $clientReview->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
    
                // Upload new image
                $image = $request->file('image');
                $imageName = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/assets/upload/'), $imageName);
                $clientReview->image = $imageName;
            }
    
            // Update other fields
            $clientReview->description = $request->input('description'); // Corrected here
            $clientReview->country = $request->input('country');
            $clientReview->state = $request->input('state');
    
            $clientReview->save();
          
    
            Toastr::success('Client review updated successfully!', 'Success');
            return redirect()->route('clientReview/list');
       
    }

    public function clientReviewDelete($id)
    {
        DB::beginTransaction();
        try {
            $clientReview = ClientReview::findOrFail($id);
            $clientReview->delete();
            DB::commit();
            Toastr::success('Client Review deleted successfully :)', 'Success');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Failed to delete Client Review :(', 'Error');
        }
        return redirect()->route('clientReview/list');
    }
    

}
