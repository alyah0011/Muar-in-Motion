<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accomodation;
use Illuminate\Support\Facades\Storage;

class AdminAccommodationController extends Controller
{
    public function index()
    {
        $accomodations = Accomodation::all();
        return view('admin.accommodation', compact('accomodations'));
    }

    public function create()
    {
        return view('admin.accommodation.create');
    }

    public function store(Request $request)
    {
        // Validation logic here

        if ($request->hasFile('acco_img')) {
            $imagePath = $request->file('acco_img')->storeAs('public/accommodation', 'accommodation-' . uniqid() . '.png');
            $imagePath = str_replace('public/', '', $imagePath);
        } else {
            $imagePath = null;
        }
    
        $accomodationData = $request->except('acco_img');
        $accomodationData['acco_img'] = $imagePath;
    
        Accomodation::create($accomodationData);
    
        return redirect()->route('admin.accommodation.index')->with('success', 'Accommodation created successfully');
    }


    public function edit($id)
    {
        $accomodation = Accomodation::findOrFail($id);
        return view('admin.accommodation.edit', compact('accomodation'));
    }

    public function update(Request $request, $id)
    {
        // Validation logic here

        $accomodation = Accomodation::findOrFail($id);

        // Check if a new image is uploaded
        if ($request->hasFile('acco_img')) {
            // Delete the old image (if it exists)
            if ($accomodation->acco_img) {
                Storage::delete('public/' . $accomodation->acco_img);
            }

            // Store the new image
            $imagePath = $request->file('acco_img')->storeAs('public/accommodation', 'accommodation-' . uniqid() . '.png');
            $imagePath = str_replace('public/', '', $imagePath);

            // Update the image path in the attraction data
            $accomodation->acco_img = $imagePath;
        }

        // Update other attraction data
        $accomodationData = $request->except('acco_img');
        $accomodation->update($accomodationData);

        return redirect()->route('admin.accommodation.index')->with('success', 'Accommodation updated successfully');
    }

    public function destroy($id)
    {
        $accomodation = Accomodation::findOrFail($id);
        $accomodation->delete();

        return redirect()->route('admin.accommodation.index')->with('success', 'Accommodation deleted successfully');
    }
}
