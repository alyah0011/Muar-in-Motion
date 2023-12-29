<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AccoReview;
use App\Models\Accomodation;

class AccoReviewController extends Controller
{
    public function store(Request $request, Accomodation $accommodation)
    {
        $request->validate([
            'rev_rating' => 'required|integer|min:1|max:5',
            'rev_comment' => 'required|string|max:255',
        ]);


        // Create a new review instance with the provided data
        $accoreview = new AccoReview;
        $accoreview->acco_id = $accommodation->acco_id;
        $accoreview->user_id = Auth::id();
        $accoreview->rev_rating = $request->input('rev_rating');
        $accoreview->rev_comment = $request->input('rev_comment');
        $accoreview->save();

        //dd($request->all());

        $accommodation->updateAverageRating();

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }
}
