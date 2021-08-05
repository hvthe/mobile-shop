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
        // dd(session()->get('cart'));
        $categories = Category::all();
        $featureProducts = Product::where('prd_featured', 1)->limit(6)->get();
        $lastProducts = Product::orderBy('prd_id', 'asc')->limit(6)->get();
        return view('frontend.index', compact('categories', 'featureProducts', 'lastProducts'));
    }
    public function product(Request $request)
    {
        $categories = Category::all();
        $prd_id = $request->id;
        $product = Product::findOrFail($prd_id);
        return view('frontend.product', compact('categories', 'product'));
    }
    public function category(Request $request)
    {
        $cat_id = $request->cat_id;
        $categories = Category::all();
        $category = Category::findOrFail($cat_id)->cat_name;
        $products = Product::where('cat_id', $cat_id)->paginate(6);
        return view('frontend.category', compact('categories', 'products', 'category'));
    }
    
}
