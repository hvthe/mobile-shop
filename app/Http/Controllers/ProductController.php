<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    
    public function index(Request $request)
    {
        $categories = Category::all();
        $products = Product::orderBy('prd_id', 'desc')->paginate(5);
        // dd($request->ajax());
        if($request->ajax()){
        return view('admin.modules.product.list-data', compact('products', 'categories'));
        }
        return view('admin.modules.product.product', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.modules.product.add_product', compact('categories'));
    }

    public function store(StoreProduct $request)
    {
        
        $product = new Product;
        $product->prd_name = $request->prd_name;
        $product->cat_id = $request->cat_id;
        $product->prd_price = $request->prd_price;
        $product->prd_image = $request->prd_image;
        $product->prd_warranty = $request->prd_warranty;
        $product->prd_accessories = $request->prd_accessories;
        $product->prd_new = $request->prd_new;
        $product->prd_promotion = $request->prd_promotion;
        $product->prd_status = $request->prd_status;
        $product->prd_featured = $request->prd_featured == 1 ? 1 : 0;
        $product->prd_details = $request->prd_details;
        $product->created_at = date('Y-m-d H:i:s');
        if($request->hasFile('prd_image')){
            $file = $request->prd_image;
            $mimeType = $file->getMimeType();
            if(substr($mimeType, 0, 5) == 'image'){
            $originName = pathinfo($file->getClientOriginalName());
            $extension = $originName['extension'];
            $filename = date('ymd-his').'-'.$originName['filename'].".$extension";
            $file->move('admin/images', $filename);
            $product->prd_image = $filename;
            }
        }else{
            $product->prd_image = 'default.jpg';
        }
        session()->flash('success.created', 'Created');
        $product->save();
        return redirect()->route('product');
    }

    public function show(Request $request)
    {
        $categories = Category::all();
        $prd_id = $request->id;
        $product = Product::findOrFail($prd_id);
        return view('admin.modules.product.edit_product', compact('product', 'categories'));
    }

    public function update(UpdateProduct $request)
    {
        $prd_id = $request->id;
        $product = Product::find($prd_id);
        $product->prd_name = $request->prd_name;
        $product->cat_id = $request->cat_id;
        $product->prd_price = $request->prd_price;
        $product->prd_image = $request->prd_image;
        $product->prd_warranty = $request->prd_warranty;
        $product->prd_accessories = $request->prd_accessories;
        $product->prd_new = $request->prd_new;
        $product->prd_promotion = $request->prd_promotion;
        $product->prd_status = $request->prd_status;
        $product->prd_featured = $request->prd_featured == 1 ? 1 : 0;
        $product->prd_details = $request->prd_details;
        if($request->hasFile('prd_image')){
            $file = $request->prd_image;
            $mimeType = $file->getMimeType();
            if(substr($mimeType, 0, 5) == 'image'){
            $originName = pathinfo($file->getClientOriginalName());
            $extension = $originName['extension'];
            $filename = date('ymd-his').'-'.$originName['filename'].".$extension";
            $file->move('admin/images', $filename);
            $product->prd_image = $filename;
            }
        }else{
            $product->prd_image = $request->prd_image_old;
        }
        $product->save();
        session()->flash('success.updated', 'Updated');
        return redirect()->route('product');
    }

    public function destroy(Request $request)
    {
        $prd_id = $request->id;
        $product = Product::findOrFail($prd_id);
        $filename = "./admin/images/{$product->prd_image}";
        $product->delete();
        if(file_exists($filename)){
            unlink($filename);
        }
        // Storage::delete($product->prd_image);
        session()->flash('success.delete', 'Deleted');
        return redirect()->route('product');
    }
}
