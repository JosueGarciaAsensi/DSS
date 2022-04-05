<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
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

Route::get('/', [HomeController::class, 'home']);

Route::get('/about', [HomeController::class, 'about']);

Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/{id}', [ProductController::class, 'productShow']);

Route::get('/cart/{id}', [CartController::class, 'showCart']);

Route::get('/search', [ProductController::class, 'search']);

// Admin routes
Route::get('/admin', [StatisticsController::class, 'statistics']);

Route::get('/admin-users', [UsersController::class, 'index']);
Route::get('/admin-users/search', [UsersController::class, 'search']);
Route::post('/admin-users/delete/{id}', [UsersController::class, 'delete']);
Route::put('/users/edit/{id}', [UsersController::class, 'edit']);
Route::post('/users/create', [UsersController::class, 'create']);

Route::get('/admin-products', [ProductController::class, 'adminShow']);
Route::post('/admin-products/delete/{id}', [ProductController::class, 'delete']);
Route::post('/admin-products/create', [ProductController::class, 'create']);
Route::put('/admin-products/edit/{id}', [ProductController::class, 'edit']);
Route::get('/admin-products/search', [ProductController::class, 'search']);

Route::get('/admin-beertypes', [BeerTypeController::class, 'index']);
Route::post('/admin-beertypes/delete/{id}', [BeerTypeController::class, 'delete']);
Route::put('/admin-beertypes/edit/{id}', [BeerTypeController::class, 'edit']);
Route::post('/admin-beertypes/create', [BeerTypeController::class, 'create']);

