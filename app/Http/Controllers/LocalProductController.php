<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LocalProduct;

class LocalProductController extends Controller
{
    public function index()
    {
        $products = LocalProduct::all();

        return view('product.product', compact('products'));
    }

    public function show($lp_id)
    {
        // Retrieve product details from the database based on ID
        $product = LocalProduct::findOrFail($lp_id);

        // Return the product detail view with the product data
        return view('product.detail', compact('product'));
    }

    public function filterProducts(Request $request)
    {
        try {
            $selectedCategories = $request->input('categories');
    
            // Check if $selectedCategories is null, and set it to an empty array if it is
            $selectedCategories = $selectedCategories ?? [];
    
            // Add "Other" filter if selected
            if (in_array('other', $selectedCategories)) {
                // Define the excluded categories
                $excludedCategories = ['Food', 'Fashion', 'Handicraft'];
    
                // Query products excluding the specified categories
                $filteredProducts = LocalProduct::whereNotIn('lp_type', $excludedCategories)->get();
            } else {
                // Query products based on selected categories
                $filteredProducts = LocalProduct::whereIn('lp_type', $selectedCategories)->get();
            }
            
    
            // You can also return the filtered products as JSON if you prefer
            return response()->json(['html' => view('product.filter', ['products' => $filteredProducts])->render()]);
    
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Error in filterProducts: ' . $e->getMessage());
    
            // Return a response with an error message (for debugging)
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    

}
