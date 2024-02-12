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

            switch (true) {
                case empty($selectedCategories):
                    // If no checkboxes are ticked, show all products
                    $filteredProducts = LocalProduct::all();
                    break;

                case in_array('food', $selectedCategories):
                    // Query products including only the food category
                    $filteredProducts = LocalProduct::where('lp_type', 'Food')->get();
                    break;

                case in_array('handicraft', $selectedCategories):
                    // Query products including only the handicraft category
                    $filteredProducts = LocalProduct::where('lp_type', 'Handicraft')->get();
                    break;

                case in_array('fashion', $selectedCategories):
                    // Query products including only the fashion category
                    $filteredProducts = LocalProduct::where('lp_type', 'Fashion')->get();
                    break;

                case in_array('other', $selectedCategories):
                    // If "Other" is checked, show categories that are not fashion, handicraft, and food
                    $excludedCategories = ['Fashion', 'Handicraft', 'Food'];
                    $filteredProducts = LocalProduct::whereNotIn('lp_type', $excludedCategories)->get();
                    break;

                default:
                    // If none of the specific categories are selected, return an empty result
                    $filteredProducts = collect();
                    break;
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
