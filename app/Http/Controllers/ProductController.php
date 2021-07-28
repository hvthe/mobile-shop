<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;       
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
    {
        $categories = Category::all();
        $products = Product::paginate(5);
        return view('admin.modules.product.product', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.modules.product.add_product', compact('categories'));
    }

    public function store(Request $request)
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
        $product->created = date('Y-m-d H:i:s');
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
        $product->save();
        return redirect()->route('product');
    }

    public function show(Request $request)
    {
        $categories = Category::all();
        $prd_id = $request->id;
        $product = Product::find($prd_id);
        return view('admin.modules.product.edit_product', compact('product', 'categories'));
    }

    public function update(Request $request)
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
            $product->prd_image = $request->prd_image;
        }
        // dd($product);
        $product->save();
        return redirect()->route('product');
    }

    public function destroy(Request $request)
    {
        $prd_id = $request->id;
        Product::destroy($prd_id);
        return redirect()->route('product');
    }

}
