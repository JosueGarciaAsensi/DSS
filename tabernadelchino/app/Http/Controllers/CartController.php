<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\User;
use App\Models\Order;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listCart(Request $request) {
        $user = User::find($request->input('id'));
        $products = [];

        if(!is_null($user)) {
            $products = $user->carts()->first()->products()->get();
        }

        if (count($products) == 0) {
            $products = [];
        }

        return view('cart')->with('products', $products);
    }

    public function addToCart(Request $request) {
        $user_id = $request->input('user_id');
        $product_id = $request->input('product_id');

        $user = User::find($user_id);
        $product = Product::find($product_id);

        $user->carts()->first()->products()->attach($product);
        
        return back();
    }

    public function removeFromCart(Request $request) {
        $user_id = $request->input('user_id');
        $product_id = $request->input('product_id');

        $user = User::find($user_id);
        $product = Product::find($product_id);

        $user->carts()->first()->products()->detach($product);

        $products = $user->carts()->first()->products()->get();

        if (count($products) == 0) {
            $products = [];
        }

        return view('cart')->with('products', $products);
    }

    public function emptyCart(Request $request) {
        $user_id = $request->input('user_id');
        $user = User::find($user_id);

        $user->carts()->first()->products()->sync([]);

        $products = $user->carts()->first()->products()->get();

        if (count($products) == 0) {
            $products = [];
        }

        return view('cart')->with('products', $products);
    }

    public function buy(Request $request) {
        $user_id = $request->input('user_id');
        $user = User::find($user_id);

        $products = $user->carts()->first()->products()->get();

        $order = new Order();
        $order->state = 'pending';
        $order->users()->associate($user);
        $order->total = floatval($request->input('total'));
        $order->save();

        // agregar productos al pedido
        foreach ($products as $product) {
            $order->products()->attach($product);
        }

        foreach ($products as $product) {
            $product->stock -= 1;
            $product->save();
        }

        $user->carts()->first()->products()->sync([]);

        return redirect('/');
    }
}
