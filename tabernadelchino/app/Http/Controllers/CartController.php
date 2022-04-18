<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listCart(Request $request) {
        $user_id = $request->input('id');
        $cart = Cart::where('user_id', '=', $user_id)->get();
        if(!$cart) {
            return view('cart')->with('products', []);
        } else {
            return view('cart')->with('products', $cart->products);
        }
    }
}
