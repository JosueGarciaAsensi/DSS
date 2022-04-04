<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\BeerType;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::where('visible', '!=', 0)->paginate(3);
        return view('products', ['products' => $products]);
    }

    public function productShow($id) {
        $products = Product::all();
        $product = Product::find($id);
        return view('product')->with('product', $product)->with('productsAlt', $this->productAlt());
    }

    protected function productAlt() {
        $productsAlt = Product::where('visible', '!=', 0)->get()->random(4);
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
        $product->visible = false;
        $product->save();
        return redirect('/admin-products')->with('success', 'deleted succesfully!');
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
        $product->description = $request->input('description');
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

    public function edit(Request $request, $id) {
        $product = Product::findOrFail($id);
        if ($request->has('name' . $id)) {
            $product->name = $request->input('name' . $id);
            $product->stock = $request->input('stock' . $id);
            $product->description = $request->input('description' . $id);
            $product->price = $request->input('price' . $id);
            $product->image = $request->input('image' . $id);
            
            if ($request->has('visible'. $id)) {
                $product->visible = 1;
            }
            else {
                $product->visible = 0;
            }

            $id = $request->input('beertype' . $id);
            $beertype = BeerType::find($id);
            $product->beer_types()->associate($beertype);
            $product->save();
        }
        return redirect('/admin-products')->with('success', 'edited succesfully!');
    }

    //SIEMPRE PILLA EL NO
    public function search(Request $request){
        $beertypes = BeerType::all();
        $product = new Product();

        if ($request->has('visible')){
            $product->visible = 1;
        }
        else{
            $product->visible = 0;
        }

        $sign = $_GET['sign'];
        echo $sign;

        $products = Product::where('visible', '=', $product->visible)
            ->where('beer_types_id', '=', $request->input('beertype'))
            ->where('price', $sign, $request->input('price'))
            ->paginate(10);
        

        return view('admin-products', ['products' => $products, 'beertypes' => $beertypes]);
    }
}
