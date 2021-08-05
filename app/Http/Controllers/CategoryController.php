<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    
    public function index(Request $request)
    {
        $categories = Category::orderBy('cat_id', 'desc')->paginate(5);
        if($request->ajax()){
            return view('admin.modules.category.data-cat', compact('categories'));
        }
        return view('admin.modules.category.category', compact('categories'));
    }

    public function create()
    {
        return view('admin.modules.category.add_category');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cat_name' => [
                'required',
                'min:6',
                'max:30',
                'unique:category,cat_name'
            ]
        ]);
        $category = new Category;
        $category->cat_name = $request->cat_name;
        $category->save();
        session()->flash('success.created', 'Created');
        $message = 'Created Success';
        return $message;
    }

    public function show(Request $request)
    {
        $cat_id = $request->id;
        $category = Category::findOrFail($cat_id);
        return view('admin.modules.category.edit_category', compact('category'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'cat_name' => 'required|min:6|max:30'
        ], [
            'required' => 'Không được để trống',
            'min' => 'Độ dài có ít nhất 6 ký tự'
        ]);
        $cat_id = $request->id;
        $category = Category::findOrFail($cat_id);
        $category->cat_name = $request->cat_name;
        $category->save();
        session()->flash('success.updated', 'Updated');
        // return redirect()->route('category');
        return 'success';
    }

    public function destroy(Request $request)
    {
        $cat_id = $request->id;
        Category::destroy($cat_id);
        session()->flash('success.delete', 'Deleted');
        return redirect()->route('category');
    }

}
