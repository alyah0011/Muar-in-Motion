<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class AdminEventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('admin.event', compact('events'));
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        // Validation logic here

        if ($request->hasFile('eve_img')) {
            $imagePath = $request->file('eve_img')->storeAs('public/event', 'event-' . uniqid() . '.png');
            $imagePath = str_replace('public/', '', $imagePath);
        } else {
            $imagePath = null;
        }
    
        $eventData = $request->except('eve_img');
        $eventData['eve_img'] = $imagePath;
    
        Event::create($eventData);
    
        return redirect()->route('admin.event.index')->with('success', 'Event created successfully');
    }


    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.event.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        // Validation logic here

        $event = Event::findOrFail($id);
        $event->update($request->all());

        return redirect()->route('admin.event.index')->with('success', 'Event updated successfully');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('admin.event.index')->with('success', 'Event deleted successfully');
    }
}
