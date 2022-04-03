<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\BeerType;
use App\Models\User;
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
        $beertypes = BeerType::all();
        return view('admin-products', ['products' => $products, 'beertypes' => $beertypes]);
    }

    //Funciona
    public function delete($id) {
        $product = Product::find($id);
        $product->delete();
        return redirect('/admin-product')->with('success', 'deleted succesfully!');
    }

    //Revisar
    public function create(Request $request) {
        $product = new Product();
        $product->name = $request->input('name');
        $product->stock = $request->input('stock');
        
        if ($request->has('visible')) {
            $product->visible = 1;
        }
        else {
            $product->visible = 0;
        }
        $product->description = $request->input('beertype');
        $product->price = $request->input('price');
        $product->image = $request->input('image');

        $id = $request->input('beertype');
        
        $beertype = BeerType::find($id);
        $product->beer_types()->associate($beertype);

        $user = new User();
        $product->users()->associate($user);
        $product->save();

        return back();
    }
}
