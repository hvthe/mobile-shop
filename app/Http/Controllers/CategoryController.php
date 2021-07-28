<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        // dd(DB::table('products')->get());
        
        $categories = Category::all();


        dd($categories);

        // return view('admin.modules.category.category', compact('category'));
    }
}
