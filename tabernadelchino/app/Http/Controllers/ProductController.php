<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function gridView() {
        $products = Product::all();
        return view('products', ['products' => $products]);
    }

    public function show($id) {
        $product = Product::findOrFail($id);
        return view('product.page', ['product' => $product]);
    }
}
