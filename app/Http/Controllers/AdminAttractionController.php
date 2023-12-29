<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attraction;
use Illuminate\Support\Facades\Storage;

class AdminAttractionController extends Controller
{
    public function index()
    {
        $attractions = Attraction::all();
        return view('admin.attraction', compact('attractions'));
    }

    public function create()
    {
        return view('admin.attraction.create');
    }

    public function store(Request $request)
    {
        // Validation logic here

        if ($request->hasFile('att_img')) {
            $imagePath = $request->file('att_img')->storeAs('public/attraction', 'attraction-' . uniqid() . '.png');
            $imagePath = str_replace('public/', '', $imagePath);
        } else {
            $imagePath = null;
        }
    
        $attractionData = $request->except('att_img');
        $attractionData['att_img'] = $imagePath;
    
        Attraction::create($attractionData);
    
        return redirect()->route('admin.attraction.index')->with('success', 'Attraction created successfully');
    }


    public function edit($id)
    {
        $attraction = Attraction::findOrFail($id);
        return view('admin.attraction.edit', compact('attraction'));
    }

    public function update(Request $request, $id)
    {
        // Validation logic here

        // Find the existing attraction
        $attraction = Attraction::findOrFail($id);

        // Check if a new image is uploaded
        if ($request->hasFile('att_img')) {
            // Delete the old image (if it exists)
            if ($attraction->att_img) {
                Storage::delete('public/' . $attraction->att_img);
            }

            // Store the new image
            $imagePath = $request->file('att_img')->storeAs('public/attraction', 'attraction-' . uniqid() . '.png');
            $imagePath = str_replace('public/', '', $imagePath);

            // Update the image path in the attraction data
            $attraction->att_img = $imagePath;
        }

        // Update other attraction data
        $attractionData = $request->except('att_img');
        $attraction->update($attractionData);

        return redirect()->route('admin.attraction.index')->with('success', 'Attraction updated successfully');
    }


    public function destroy($id)
    {
        $attraction = Attraction::findOrFail($id);
        $attraction->bookmarks()->delete();
        $attraction->delete();

        return redirect()->route('admin.attraction.index')->with('success', 'Attraction deleted successfully');
    }

    
}
