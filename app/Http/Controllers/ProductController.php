<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product', compact('products'));
    }

    public function showFietsen()
    {
        $products = Product::where('category_id', 1)->get();
        return view('products.fietsen', compact('products'));
    }

    public function showElektrischeFietsen()
    {
        $products = Product::where('category_id', 2)->get();
        return view('products.elektrischefietsen', compact('products'));
    }
}
