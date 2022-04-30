<?php

use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BeerTypeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LanguageController;
use App\Models\Address;

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

// Authentication
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::post('/resetPassword', [HomeController::class, 'resetPassword'])->name('resetPassword');

// Usuario
Route::get('/user/{id}', [UsersController::class, 'myProfile'])->name('user-profile');
Route::get('/user/{id}/orders', [OrderController::class, 'listOrders'])->name('user-orders');
Route::patch('/user/{id}', [UsersController::class, 'edit'])->name('user-edit');
Route::patch('/address/{id}', [AddressController::class, 'edit'])->name('user-address');
Route::post('/user', [UsersController::class, 'create'])->name('user-create');
Route::delete('/user/{id}', [UsersController::class, 'delete'])->name('user-delete');

/*
// Usuario admistrador
Route::middleware('/user/{id}/admin')->group(function () {
    $useridinroute = '/user/{id}';
    Route::get($useridinroute.'/admin', [StatisticsController::class, 'statistics'])->name('admin');

    Route::get($useridinroute.'/admin/users', [UsersController::class, 'index'])->name('admin-users');
    Route::get($useridinroute.'/admin/users', [UsersController::class, 'filter'])->name('admin-users-filter');
    Route::delete($useridinroute.'/admin/users/{id}', [UsersController::class, 'destroy'])->name('admin-users-delete');

    Route::get($useridinroute.'/admin/products', [ProductController::class, 'adminShow'])->name('admin-products');
    Route::patch($useridinroute.'/admin/products/{id}', [ProductController::class, 'edit'])->name('admin-products-edit');
    Route::delete($useridinroute.'/admin/products/{id}', [ProductController::class, 'destroy'])->name('admin-products-delete');
    Route::post($useridinroute.'/admin/products', [ProductController::class, 'create'])->name('admin-products-create');
    Route::get($useridinroute.'/admin/products/', [ProductController::class, 'filter'])->name('admin-products-filter');

    Route::get($useridinroute.'/admin/beertypes', [BeerTypeController::class, 'index'])->name('admin-beertypes');
    Route::delete($useridinroute.'/admin/beertypes', [BeerTypeController::class, 'destroy'])->name('admin-beertypes-destroy');
    Route::post($useridinroute.'/admin/beertypes', [BeerTypeController::class, 'create'])->name('admin-beertypes-create');
    Route::patch($useridinroute.'/admin/beertypes/{id}', [BeerTypeController::class, 'edit'])->name('admin-beertypes-edit');

    Route::get($useridinroute.'/admin/orders', [OrderController::class, 'index'])->name('admin-orders');
    Route::get($useridinroute.'/admin/orders', [OrderController::class, 'filter'])->name('admin-orders-filter');
}); */

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
