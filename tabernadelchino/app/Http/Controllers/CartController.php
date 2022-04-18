<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listCart(Request $request) {
        $user = User::where('name', '=', $request->input('name'))->get();

        if(!is_null($user)) {
            $cart = $user->carts;
            return view('cart')->with('products', $cart->products);
        }

        return view('cart')->with('products', []);
    }

    public function addToCart(Request $request) {
        $user_id = $request->input('user_id');
        $product_id = $request->input('product_id');

        $user = User::find($user_id);
        $product = Product::find($product_id);

        if (!is_null($user))
            $user->carts()->products()->attach($product);
        
        return back();
    }
}
