<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;

class OrderController extends Controller
{
    public function index ()
    {
        $orders = Order::orderBy('ord_id', 'desc')->paginate(5);
        return view('admin.modules.order.order', compact('orders'));
    }
    public function detail (Request $request)
    {
        $ord_id = $request->id;
        $order = Order::findOrFail($ord_id);
        $products = $order->products;
        return view('admin.modules.order.order-detail', compact('order', 'products'));
    }
    public function update ()
    {
        echo 'update';
    }
    public function create ()
    {
        echo 'create';
    }
    public function store ()
    {
        echo 'store';
    }
    public function destroy ()
    {
        echo 'destroy';
    }
}
