<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $featureProducts = Product::where('prd_featured', 1)->limit(6)->get();
        $lastProducts = Product::orderBy('prd_id', 'desc')->limit(6)->get();
        return view('frontend.index', compact('categories', 'featureProducts', 'lastProducts'));
    }
    public function product()
    {
        $categories = Category::all();
        // $featureProducts = Product::where('prd_featured', 1)->limit(6)->get();
        // $lastProducts = Product::orderBy('prd_id', 'desc')->limit(6)->get();
        
        return view('frontend.product', compact('categories'));
    }
}
