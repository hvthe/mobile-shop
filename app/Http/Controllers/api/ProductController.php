<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::orderBy('prd_id', 'desc')->paginate(5);
        return view('admin.modules.product.list-data', compact('products', 'categories'));
    }
}
