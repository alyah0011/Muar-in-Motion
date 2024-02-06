<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
/**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::orderBy('eve_date')->get();
        //dd($events);
        return view('event.main', compact('events'));
    }

    public function show($eve_id)
    {
        $event = Event::find($eve_id);
    
        if (!$event) {
            abort(404); // Handle the case when the event is not found
        }
    
        return view('event.child', ['event' => $event]);
    }
    
    public function filterEvents(Request $request)
    {
        try {
            $selectedDates = $request->input('dates');

            // Check if $selectedDates is null, and set it to an empty array if it is
            $selectedDates = $selectedDates ?? [];

            $filteredEvents = Event::where(function ($query) use ($selectedDates) {
                foreach ($selectedDates as $date) {
                    switch ($date) {
                        case 'jan':
                            $query->orWhereMonth('eve_date', 1);
                            break;
                        case 'feb':
                            $query->orWhereMonth('eve_date', 2);
                            break;
                        case 'mar':
                            $query->orWhereMonth('eve_date', 3);
                            break;
                        case 'apr':
                            $query->orWhereMonth('eve_date', 4);
                            break;
                        case 'may':
                            $query->orWhereMonth('eve_date', 5);
                            break;
                        case 'jun':
                            $query->orWhereMonth('eve_date', 6);
                            break;
                        case 'jul':
                            $query->orWhereMonth('eve_date', 7);
                            break;
                        case 'aug':
                            $query->orWhereMonth('eve_date', 8);
                            break;
                        case 'sep':
                            $query->orWhereMonth('eve_date', 9);
                            break;
                        case 'oct':
                            $query->orWhereMonth('eve_date', 10);
                            break;
                        case 'nov':
                            $query->orWhereMonth('eve_date', 11);
                            break;
                        case 'dec':
                            $query->orWhereMonth('eve_date', 12);
                            break;
                        default:
                            // Handle other cases or provide a default behavior
                            break;
                    }
                }
            })->get();

            // You can also return the filtered events as JSON if you prefer
            return response()->json(['html' => view('event.filter', ['events' => $filteredEvents])->render()]);

        } catch (\Exception $e) {
            // Log the error
            \Log::error('Error in filterEvents: ' . $e->getMessage());

            // Return a response with an error message (for debugging)
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


}
