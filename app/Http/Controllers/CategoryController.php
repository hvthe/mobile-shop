<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::orderBy('cat_id', 'desc')->paginate(5);
        return view('admin.modules.category.category', compact('categories'));
    }

    public function create()
    {
        return view('admin.modules.category.add_category');
    }

    public function store(Request $request)
    {
        $category = new Category;
        $category->cat_name = $request->cat_name;
        $category->save();
        session()->flash('success.created', 'Created');
        return redirect()->route('category');
    }

    public function show(Request $request)
    {
        $cat_id = $request->id;
        $category = Category::findOrFail($cat_id);
        return view('admin.modules.category.edit_category', compact('category'));
    }

    public function update(Request $request)
    {
        $cat_id = $request->id;
        $category = Category::findOrFail($cat_id);
        $category->cat_name = $request->cat_name;
        $category->save();
        session()->flash('success.updated', 'Updated');
        return redirect()->route('category');
    }

    public function destroy(Request $request)
    {
        $cat_id = $request->id;
        Category::destroy($cat_id);
        session()->flash('success.delete', 'Deleted');
        return redirect()->route('category');
    }

}
