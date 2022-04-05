<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;

class CartController extends Controller
{
    public function showCart($id) {
        $cart = Cart::find($id);
        if(!$cart) {
            return view('cart')->with('products', []);
        } else {
            return view('cart')->with('products', $cart->products);
        }
    }
}
