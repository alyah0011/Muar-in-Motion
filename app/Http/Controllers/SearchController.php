<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attraction;
use App\Models\Event;
use App\Models\Accomodation;
use App\Models\Transportation;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $results = [];

        // Events
        $events = Event::where('eve_name', 'LIKE', '%' . $query . '%')
            ->orWhere('eve_sdesc', 'LIKE', '%' . $query . '%')
            ->get();

        foreach ($events as $event) {
            $event->type = 'event';
            $results[] = $event;
        }

        // Attractions
        $attractions = Attraction::where('att_name', 'LIKE', '%' . $query . '%')
            ->orWhere('att_sdesc', 'LIKE', '%' . $query . '%')
            ->get();

        foreach ($attractions as $attraction) {
            $attraction->type = 'attraction';
            $results[] = $attraction;
        }

        // Accommodations
        $accommodations = Accomodation::where('acco_name', 'LIKE', '%' . $query . '%')
            ->orWhere('acco_sdesc', 'LIKE', '%' . $query . '%')
            ->get();

        foreach ($accommodations as $accommodation) {
            $accommodation->type = 'accommodation';
            $results[] = $accommodation;
        }

        // Transportations
        $transportations = Transportation::where('trans_name', 'LIKE', '%' . $query . '%')
            ->orWhere('trans_sdesc', 'LIKE', '%' . $query . '%')
            ->get();

        foreach ($transportations as $transportation) {
        $transportation->type = 'transportation';
        $results[] = $transportation;
        }

        return view('result', compact('results'));
    }
}
