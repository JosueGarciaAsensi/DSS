<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/sobre-nosotros', function () {
    return view('about');
});

//Route::get('/products', function() {
//    $products = Product::all();
//    return view('products')->with('products', $products);
//});

Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/{id}', function($id){
    $products = Product::all();
    $product = Product::find($id);
    return view('product')->with('product', $product)->with('products', $products);
});