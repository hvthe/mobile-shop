<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Symfony\Component\Finder\Iterator\CustomFilterIterator;

class CartController extends Controller
{
    public function cart(Request $request)
    {
        $categories = Category::all();
        if (empty(session()->get('cart'))) {
            return view('frontend.cart', compact('categories'));
        }
        $cart = session()->get('cart');
        $prd_id_list = [];
        $total = 0;
        foreach ($cart as $prd_id => $quantity) {
            $prd_id_list[] = $prd_id;
        }
        $products = Product::whereIn('prd_id', $prd_id_list)->get();
        foreach ($products as $product) {
            $total += $product->prd_price * $cart[$product->prd_id];
        }
        session()->put('total', $total);
        return view('frontend.cart', compact('categories', 'cart', 'products', 'total'));
    }

    public function storeCart(Request $request)
    {
        $validate = $request->validate([
            'id' => 'exists:products,prd_id'
        ]);
        $prd_id = $request->id;
        $categories = Category::all();
        if (session()->has("cart.$prd_id")) {
            $quantity = session()->get("cart.$prd_id");
            session()->put("cart.$prd_id", ++$quantity);
        } else {
            session()->put("cart.$prd_id", 1);
        }
        if ($request->ajax()) {
            return array_sum(session()->get("cart"));
        }
        return redirect()->route('cart');
    }

    public function updateCart(Request $request)
    {
        session()->put('cart', $request->get('quantity'));

        if ($request->ajax()) {
            return $this->showCartItem();
        }
        return redirect()->route('cart');
    }

    public function delete(Request $request)
    {
        $prd_id = $request->id;
        if (session()->has("cart.$prd_id")) {
            session()->pull("cart.$prd_id");
        }
        if ($request->ajax()) {
           return $this->showCartItem();
        }
        return redirect()->route('cart');
    }

    public function showCartItem()
    {
        $cart = session()->get('cart');
        $prd_id_list = [];
        $total = 0;
        foreach ($cart as $prd_id => $quantity) {
            $prd_id_list[] = $prd_id;
        }
        $products = Product::whereIn('prd_id', $prd_id_list)->get();
        foreach ($products as $product) {
            $total += $product->prd_price * $cart[$product->prd_id];
        }
        session()->put('total', $total);
        return view('frontend.cart-item', compact('cart', 'products', 'total'));
    }
    
    public function order(Request $request)
    {
        $categories = Category::all();
        $validated = $request->validate([
            'name' => 'required|min:6',
            'phone' => 'required|min:0|numeric',
            'mail' => 'required|email',
            'add' => 'required',
        ]);
        $customer = Customer::where('phone', $request->phone)->first();
        if ($customer == null) {
            $customer = new Customer;
            $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->address = $request->add;
            $customer->save();
            $customer_id = Customer::orderBy('customer_id', 'desc')->get()->first()->customer_id;
        } else {
            $customer_id = $customer->customer_id;
        }
        $order = new Order;
        $order->customer_id = $customer_id;
        $order->value = session()->get('total');
        $order->save();
        $newOrder = Order::orderBy('ord_id', 'desc')->get()->first();
        $cart = session()->get('cart');
        foreach ($cart as $prd_id => $quantity) {
            $orderDetail = new OrderDetail;
            $orderDetail->ord_id = $newOrder->ord_id;;
            $orderDetail->prd_id = $prd_id;
            $orderDetail->quantity = $quantity;
            $orderDetail->save();
        }
        session()->forget('cart');
        return view('frontend.success', compact('categories'));
    }
}
