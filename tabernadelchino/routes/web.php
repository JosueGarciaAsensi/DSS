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

Auth::routes(['register' => false]);

/*
 * Lógica
 *
 * get -> crear o leer objeto
 * post -> crear o leer objeto protegiendo la query
 * put -> actualizar puntero al objeto
 * patch -> actualizar objeto
 * delete -> borrar objeto
 */

 // Inicio
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/home', [HomeController::class, 'home']);
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

// Productos
Route::get('/products', [ProductController::class, 'grid'])->name('products');
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/search', [ProductController::class, 'search'])->name('search');

// Authentication
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::post('/register', [UsersController::class, 'create'])->name('user-create');
Route::post('/resetPassword', [UsersController::class, 'resetPassword'])->name('resetPassword');

// Carrito
Route::middleware('auth')->group(function () {
    Route::get('/cart/{id}', [CartController::class, 'list'])->name('cart-list');
    Route::post('/cart/{id}', [CartController::class, 'buy'])->name('cart-buy');
    Route::patch('/cart/{id}/{idItem}', [CartController::class, 'add'])->name('cart-add');
    Route::delete('/cart/{id}', [CartController::class, 'empty'])->name('cart-empty');
    Route::delete('/cart/{id}/{idItem}', [CartController::class, 'remove'])->name('cart-remove');
});

// Usuario
Route::middleware('auth')->group(function () {
    Route::get('/user/{id}', [UsersController::class, 'show'])->name('user-profile');
    Route::get('/user/{id}/orders', [OrderController::class, 'list'])->name('user-orders');
    Route::patch('/user/{id}', [UsersController::class, 'edit'])->name('user-edit');
    Route::patch('/address/{id}', [AddressController::class, 'edit'])->name('user-address');
    Route::delete('/user/{id}', [UsersController::class, 'destroy'])->name('user-delete');
});

// Admin routes
Route::middleware('admin')->group(function () {
    // Inicio
    Route::get('/admin', [StatisticsController::class, 'statistics'])->name('admin');

    // Usuarios
    Route::get('/admin/users', [UsersController::class, 'list'])->name('admin-users');
    Route::post('/admin/users', [UsersController::class, 'create'])->name('admin-user-create');
    Route::get('/admin/users/filtered', [UsersController::class, 'filter'])->name('admin-users-filter');
    Route::patch('/admin/users/{id}', [UsersController::class, 'edit'])->name('admin-user-edit');
    Route::delete('/admin/users/{id}', [UsersController::class, 'destroy'])->name('admin-user-delete');

    // Productos
    Route::get('/admin/products', [ProductController::class, 'list'])->name('admin-products');
    Route::post('/admin/products', [ProductController::class, 'create'])->name('admin-product-create');
    Route::get('/admin/products/filtered', [ProductController::class, 'filter'])->name('admin-products-filter');
    Route::patch('/admin/products/{id}', [ProductController::class, 'edit'])->name('admin-product-edit');
    Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('admin-product-delete');

    // Beertypes
    Route::get('/admin/beertypes', [BeerTypeController::class, 'list'])->name('admin-beertypes');
    Route::post('/admin/beertypes', [BeerTypeController::class, 'create'])->name('admin-beertype-create');
    Route::patch('/admin/beertypes/{id}', [BeerTypeController::class, 'edit'])->name('admin-beertype-edit');
    Route::delete('/admin/beertypes/{id}', [BeerTypeController::class, 'destroy'])->name('admin-beertype-delete');

    // Pedidos
    Route::get('/admin/orders', [OrderController::class, 'adminlist'])->name('admin-orders');
    Route::get('/admin/orders/filtered', [OrderController::class, 'filter'])->name('admin-orders-filter');
});
