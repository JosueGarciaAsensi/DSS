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

Route::get('/sobre-nosotros', [HomeController::class, 'sobreNosotros']);

Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/{id}', [ProductController::class, 'productShow']);

Route::get('/cart/{id}', [CartController::class, 'showCart']);

// Admin routes
Route::get('/admin', [StatisticsController::class, 'statistics']);

Route::get('/admin-users', [UsersController::class, 'index']);
Route::post('/users/delete/{id}', [UsersController::class, 'delete']);
Route::put('/users/edit/{id}', [UsersController::class, 'edit']);
Route::put('/users/create', [UsersController::class, 'create']);

Route::get('/admin-products', [ProductController::class, 'adminShow']);
Route::post('/products/delete/{id}', [ProductController::class, 'delete']);
Route::put('/products/create', [ProductController::class, 'create']);

Route::get('/admin-beertypes', [BeerTypeController::class, 'index']);