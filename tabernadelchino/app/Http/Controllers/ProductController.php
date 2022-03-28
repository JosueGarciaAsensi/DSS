<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::paginate(3);
        return view('products', ['products' => $products]);
    }

    public function productShow($id) {
        $products = Product::all();
        $product = Product::find($id);
        return view('product')->with('product', $product)->with('products', $products);
    }
}
