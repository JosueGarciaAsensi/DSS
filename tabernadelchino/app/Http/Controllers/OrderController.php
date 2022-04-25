<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listOrders(Request $request) {
        $user = User::find($request->input('id'));
        $orders = [];

        if(!is_null($user)) {
            $orders = Order::where('users_id', $user->id)->get();
        }

        if (count($orders) == 0) {
            $orders = [];
        }

        return view('orders')->with('orders', $orders);
    }
}
