<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use App\Models\Attraction;


class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Attraction $attraction)
    {
        $request->validate([
            'rev_rating' => 'required|integer|min:1|max:5',
            'rev_comment' => 'required|string|max:255',
        ]);


        // Create a new review instance with the provided data
        $review = new Review;
        $review->att_id = $attraction->att_id;
        $review->user_id = Auth::id();
        $review->rev_rating = $request->input('rev_rating');
        $review->rev_comment = $request->input('rev_comment');
        $review->save();

        //dd($request->all());

        $attraction->updateAverageRating();

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }
        

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
