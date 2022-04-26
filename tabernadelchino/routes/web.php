<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BeerTypeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;

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

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/{id}', [ProductController::class, 'productShow']);
Route::get('/search', [ProductController::class, 'search'])->name('search');

Route::post('/cart', [CartController::class, 'listCart'])->name('cart');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('addToCart');
Route::post('/remove-from-cart', [CartController::class, 'removeFromCart'])->name('removeFromCart');
Route::post('/emptyCart', [CartController::class, 'emptyCart'])->name('emptyCart');


// Authentication
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::post('/resetPassword', [HomeController::class, 'resetPassword'])->name('resetPassword');

// Admin routes
Route::get('/admin', [StatisticsController::class, 'statistics'])->name('admin')->middleware('auth');

Route::get('/admin-users', [UsersController::class, 'index'])->middleware('auth');
Route::get('/admin-users/search', [UsersController::class, 'filter']);
Route::post('/admin-users/delete/{id}', [UsersController::class, 'destroy']);
Route::put('/users/edit/{id}', [UsersController::class, 'edit']);
Route::post('/users/create', [UsersController::class, 'create'])->name('create');

Route::get('/admin-products', [ProductController::class, 'adminShow'])->middleware('auth');
Route::post('/admin-products/delete/{id}', [ProductController::class, 'destroy']);
Route::post('/admin-products/create', [ProductController::class, 'create']);
Route::put('/admin-products/edit/{id}', [ProductController::class, 'edit']);
Route::get('/admin-products/search', [ProductController::class, 'filter']);

Route::get('/admin-beertypes', [BeerTypeController::class, 'index'])->middleware('auth');
Route::post('/admin-beertypes/delete/{id}', [BeerTypeController::class, 'destroy']);
Route::put('/admin-beertypes/edit/{id}', [BeerTypeController::class, 'edit']);
Route::post('/admin-beertypes/create', [BeerTypeController::class, 'create']);