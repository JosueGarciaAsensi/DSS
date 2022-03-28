<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class StatisticsController extends Controller
{
    public function statistics() {
        $products = Product::all();
        $users = User::all();
        $orders = Order::all();
        return view('admin-menu')->with('productsCount', count($products))->with('usersCount', count($users))->with('ordersCount', count($orders));
    }
}
