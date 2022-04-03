<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\BeerType;
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
        return view('product')->with('product', $product)->with('products', $products)->with('productsAlt', $this->productAlt($products));
    }

    protected function productAlt($products) {
        $indexes = array();
        foreach (range(0, count($products) - 1) as $i) {
            $indexes[] = $i;
        }
        shuffle($indexes);
        $productsAlt = array();
        $productsAlt[] = $products[$indexes[0]];
        $productsAlt[] = $products[$indexes[1]];
        $productsAlt[] = $products[$indexes[2]];
        $productsAlt[] = $products[$indexes[3]];

        return $productsAlt;
    }

    public function adminShow() {
        $products = Product::paginate(10);
        return view('admin-products', ['products' => $products]);
    }

    //No funciona
    public function delete($id) {
        $product = Product::find($id);
        $product->delete();
        return redirect('/admin-product')->with('success', 'deleted succesfully!');
    }

    //Cambiar el null y faltan cosas [es raro]
    public function create(Request $request) {
        $beertype = new BeerType();
        $beertype->names = $request->input('type');

        $product = new Product();
        $product->name = $request->input('name');
        $product->stock = $request->inpunt('stock');
        $product->users_id = null;
        $products->description = $request->input('description');
        $products->price = $request->input('price');
        $products->image = $request->input('image');
        $product->beertypes()->associate($beertype);
        $product->save();

        return back();
    }
}
