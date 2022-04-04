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
        return view('admin-menu')->with('productsCount', count($products))->with('usersCount', count($users))->with('ordersCount', count($orders))->with('product', $this->productoEstrella($orders, $products));
    }

    protected function productoEstrella($orders, $products) {
        $points = array();

        foreach ($products as $p) {
            $points[] = 0;
        }

        foreach ($orders as $order) {
            $ordered_products = $order->products()->orderBy('id')->get();
            foreach ($ordered_products as $ordered_product) {
                $points[$ordered_product->id - 1] += 1;
            }
        }

        $index = array_search(max($points), $points);

        return $products[$index+1];
    }
}
