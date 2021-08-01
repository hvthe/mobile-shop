<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::orderBy('customer_id', 'desc')->paginate(5);
        return view('admin.modules.customer.customer', compact('customers'));
    }

    public function history(Request $request)
    {
        $customer_id = $request->id;
        $customer = Customer::findOrFail($customer_id);
        $orders = $customer->orders;
        return view('admin.modules.customer.history', compact('orders', 'customer'));
    }
}
