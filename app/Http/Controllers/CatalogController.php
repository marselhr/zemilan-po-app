<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Routing\Controller;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $categories = ProductCategory::all();

        return view('catalog', compact('products', 'categories'));
    }


    public function show(string $id)
    {
        $products_categories = ProductCategory::all();
        $products = Product::find($id);
        return view('detail', compact('products'));
    }

    public function filterProducts(Request $request)
    {
        $categories = ProductCategory::all();

        // Check if a category filter is applied
        if (request()->category_filter) {
            $resultCategory = request()->category_filter;
            $products = Product::where('category_id', $resultCategory)->with(['category'])->get();
        } else {
            // If no category filter is applied, fetch all products
            $products = Product::with(['category'])->get();
        }

        // Pass categories and products to the view
        return view('catalog', compact('categories', 'products'));
    }
}
