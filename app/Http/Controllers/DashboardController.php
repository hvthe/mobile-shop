<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;
use App\Models\Customer;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $productCount = Product::count();
        $categoryCount = Category::count();
        $userCount = User::count();
        $orderCount = Order::count();
        $customerCount = Customer::count();
        return view('admin.dashboard',
        compact('productCount', 'categoryCount', 'orderCount', 'customerCount', 'userCount'));
    }
}
