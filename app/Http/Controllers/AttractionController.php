<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attraction; 

class AttractionController extends Controller
{
    public function attractionsByCategory($category)
    {
        $attractions = Attraction::where('att_cat', $category)->get();
        return view('attraction.category', compact('attractions', 'category'));
    }

    public function show($att_id)
    {
        $attraction = Attraction::with('reviews')->find($att_id);
    
        if (!$attraction) {
            abort(404); // Handle the case when the event is not found
        }
    
        return view('attraction.detail', ['attraction' => $attraction]);
    }

    public function index()
    {
        $topAttractions = Attraction::orderByDesc('average_rating')->take(6)->get();
        return view('attraction.main', compact('topAttractions'));
    }


}
