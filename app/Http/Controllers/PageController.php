<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home ()
    {
        $categories = Category::all();
        return view('welcome', [
                'categories' => $categories,
        ]);
    }
    
    public function category ()
    {
        $categories = Category::all();
        return view('categories', [
            'categories' => $categories,
    ]);
    }
    
    // public function productPage(Request $request)
    // {
    //     return view('product',[
    //         'name' => 'fiets',
    //         'price' => '150',
    //         'color' => 'blauw',
    //     ]
    // );
    // } wordt niet gebruikt
}

