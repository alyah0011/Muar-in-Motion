<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LocalProduct;

class AdminProductController extends Controller
{
    public function index()
    {
        $localProducts = LocalProduct::all();
        return view('admin.product', compact('localProducts'));
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
        // Validation logic here

        if ($request->hasFile('lp_img')) {
            $imagePath = $request->file('lp_img')->storeAs('public/local_products', 'local_product-' . uniqid() . '.png');
            $imagePath = str_replace('public/', '', $imagePath);
        } else {
            $imagePath = null;
        }
    
        $localProductData = $request->except('lp_img');
        $localProductData['lp_img'] = $imagePath;
    
        LocalProduct::create($localProductData);
    
        return redirect()->route('admin.product.index')->with('success', 'Local Product created successfully');
    }


    public function edit($id)
    {
        $localProduct = LocalProduct::findOrFail($id);
        return view('admin.product.edit', compact('localProduct'));
    }

    public function update(Request $request, $id)
    {
        // Validation logic here

        $localProduct = LocalProduct::findOrFail($id);

        // Check if a new image is uploaded
        if ($request->hasFile('lp_img')) {
            // Delete the old image (if it exists)
            if ($localProduct->lp_img) {
                Storage::delete('public/' . $localProduct->lp_img);
            }

            // Store the new image
            $imagePath = $request->file('lp_img')->storeAs('public/local_products', 'local_product-' . uniqid() . '.png');
            $imagePath = str_replace('public/', '', $imagePath);

            // Update the image path in the local product data
            $localProduct->lp_img = $imagePath;
        }

        // Update other local product data
        $localProductData = $request->except('lp_img');
        $localProduct->update($localProductData);

        return redirect()->route('admin.product.index')->with('success', 'Local Product updated successfully');
    }

    public function destroy($id)
    {
        $localProduct = LocalProduct::findOrFail($id);
        $localProduct->delete();

        return redirect()->route('admin.product.index')->with('success', 'Local Product deleted successfully');
    }
}
