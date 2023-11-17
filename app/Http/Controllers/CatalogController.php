<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('catalog', compact('products'));
    }

    public function show(string $id)
    {
        $products = Product::find($id);
        return view('detail', compact('products'));
    }
}
