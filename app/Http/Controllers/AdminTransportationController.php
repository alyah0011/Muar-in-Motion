<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transportation;

class AdminTransportationController extends Controller
{
    public function index()
    {
        $transportations = Transportation::all();
        return view('admin.transportation', compact('transportations'));
    }

    public function create()
    {
        return view('admin.transportation.create');
    }

    public function store(Request $request)
    {
        // Validation logic here

        if ($request->hasFile('trans_img')) {
            $imagePath = $request->file('trans_img')->storeAs('public/transportation', 'transportation-' . uniqid() . '.png');
            $imagePath = str_replace('public/', '', $imagePath);
        } else {
            $imagePath = null;
        }
    
        $transportationData = $request->except('trans_img');
        $transportationData['trans_img'] = $imagePath;
    
        Transportation::create($transportationData);
    
        return redirect()->route('admin.transportation.index')->with('success', 'Transportation created successfully');
    }


    public function edit($id)
    {
        $transportation = Transportation::findOrFail($id);
        return view('admin.transportation.edit', compact('transportation'));
    }

    public function update(Request $request, $id)
    {
        // Validation logic here

        $transportation = Transportation::findOrFail($id);
        $transportation->update($request->all());

        return redirect()->route('admin.transportation.index')->with('success', 'Transportation updated successfully');
    }

    public function destroy($id)
    {
        $transportation = Transportation::findOrFail($id);
        $transportation->delete();

        return redirect()->route('admin.transportation.index')->with('success', 'Transportation deleted successfully');
    }
}
