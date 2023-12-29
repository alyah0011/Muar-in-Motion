<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homepage;
use Illuminate\Support\Facades\Storage;

class AdminHomepageController extends Controller
{
    // AdminHomepageController.php
    public function index()
    {
        // Retrieve all records from the homepages table
        $homepages = Homepage::all();

        // Pass the data to the view
        return view('admin.homepage', compact('homepages'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data here

        // Retrieve the homepage record with the specified ID
        $homepage = Homepage::findOrFail($id);

        // Update other fields
        $homepage->update($request->except('banner_img', 'history_img'));

        // Handle file uploads
        if ($request->hasFile('banner_img')) {
            // Delete old file if it exists
            if ($homepage->banner_img) {
                Storage::delete($homepage->banner_img);
            }

            // Store the new file
            $homepage->banner_img = $request->file('banner_img')->storeAs('homepage', $homepage->homepage_id . '-banner.png', 'public');

        }

        if ($request->hasFile('history_img')) {
            // Delete old file if it exists
            if ($homepage->history_img) {
                Storage::delete($homepage->history_img);
            }

            // Store the new file
            $homepage->history_img = $request->file('history_img')->storeAs('homepage', $homepage->homepage_id . '-history.png', 'public');


        }

        // Save the changes
        $homepage->save();

        // Redirect back to the index or any other appropriate route
        return redirect()->route('admin.homepage.index')->with('success', 'Homepage updated successfully');
    }


}
