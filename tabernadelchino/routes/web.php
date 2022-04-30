<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BeerTypeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LanguageController;


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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/{id}', [ProductController::class, 'productShow']);
Route::get('/search', [ProductController::class, 'search'])->name('search');

/*
 * Lógica
 *
 * get -> crear o leer objeto
 * post -> crear o leer objeto protegiendo la query
 * put -> actualizar puntero al objeto
 * patch -> actualizar objeto
 * delete -> borrar objeto
 */

// Carrito
Route::get('/cart/{id}', [CartController::class, 'listCart'])->name('cart-list');
Route::post('/cart/{id}', [CartController::class, 'buy'])->name('cart-buy');
Route::patch('/cart/{id}/{idItem}', [CartController::class, 'addToCart'])->name('cart-add');
Route::delete('/cart/{id}', [CartController::class, 'emptyCart'])->name('cart-empty');
Route::delete('/cart/{id}/{idItem}', [CartController::class, 'removeFromCart'])->name('cart-remove');

/*
Route::post('/cart', [CartController::class, 'listCart'])->name('cart');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('addToCart'); // Patch
Route::post('/remove-from-cart', [CartController::class, 'removeFromCart'])->name('removeFromCart'); // Delete id
Route::post('/emptyCart', [CartController::class, 'emptyCart'])->name('emptyCart'); // delete
Route::post('/buy', [CartController::class, 'buy'])->name('buy'); */

Route::post('/myorders', [OrderController::class, 'listOrders'])->name('myorders');
Route::post('/myprofile', [UsersController::class, 'myProfile'])->name('myprofile');
//Route::patch('/myprofile/{id}', [UserController::class, 'edit'])->name('myprofile');

// Authentication
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::post('/resetPassword', [HomeController::class, 'resetPassword'])->name('resetPassword');

Route::put('/users/edit/{id}', [UsersController::class, 'edit']);
Route::post('/users/create', [UsersController::class, 'create'])->name('create');


// Admin routes
Route::middleware('admin')->group(function () {
    Route::get('/admin', [StatisticsController::class, 'statistics'])->name('admin');

    Route::get('/admin-users', [UsersController::class, 'index']);
    Route::get('/admin-users/search', [UsersController::class, 'filter']);
    Route::post('/admin-users/delete/{id}', [UsersController::class, 'destroy']);

    // /admin
    // /admin/products
    // /admin/beertypes
    // /admin/orders

    Route::get('/admin-products', [ProductController::class, 'adminShow']);
    Route::post('/admin-products/delete/{id}', [ProductController::class, 'destroy']);
    Route::post('/admin-products/create', [ProductController::class, 'create']);
    Route::put('/admin-products/edit/{id}', [ProductController::class, 'edit']);
    Route::get('/admin-products/search', [ProductController::class, 'filter']);

    Route::get('/admin-beertypes', [BeerTypeController::class, 'index']);
    Route::post('/admin-beertypes/delete/{id}', [BeerTypeController::class, 'destroy']);
    Route::put('/admin-beertypes/edit/{id}', [BeerTypeController::class, 'edit']);
    Route::post('/admin-beertypes/create', [BeerTypeController::class, 'create']);

    Route::get('/admin-orders', [OrderController::class, 'index']);
    Route::get('/admin-orders/search', [OrderController::class, 'filter']);
});
