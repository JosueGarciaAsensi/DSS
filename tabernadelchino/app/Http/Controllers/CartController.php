<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Cart;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listCart($id) {
        $cart = Cart::find($id);
        $products = [];

        foreach ($cart->products as $product) {
            $products[] = $product;
        }

        return view('cart')->with('products', $products);
    }

    public function addToCart($id, $idItem) {
        $cart = Cart::find($id);
        $product = Product::find($idItem);

        $cart->products()->attach($product);

        return back();
    }

    public function removeFromCart($id, $idItem) {
        $cart = Cart::find($id);
        $product = Product::find($idItem);

        $cart->products()->detach($product);

        return redirect()->back();
    }

    public function emptyCart($id) {
        $cart = Cart::find($id);

        $cart->products()->sync([]);

        return redirect()->back();
    }

    public function buy($id, Request $request) {
        $cart = Cart::find($id);

        $products = $cart->products()->get();

        $order = new Order();
        $order->state = 'pending';
        $order->users()->associate($request->input('user'));
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

        $cart->products()->sync([]);

        return redirect()->back();
    }
}
