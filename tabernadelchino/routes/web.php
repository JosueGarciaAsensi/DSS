<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BeerTypeController;

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

Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/{id}', [ProductController::class, 'productShow']);

Route::get('/cart', function() {
    $products = [];
    return view('cart')->with($products); 
});

// Admin routes
Route::get('/admin', [StatisticsController::class, 'statistics']);

Route::get('/admin-users', [UsersController::class, 'index']);

Route::get('/admin-beertypes', [BeerTypeController::class, 'index']);