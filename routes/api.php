<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('products', [App\Http\Controllers\ProductController::class,'list']);
Route::get('products/gift', [App\Http\Controllers\ProductController::class,'gift']);
Route::get('products/{id}', [App\Http\Controllers\ProductController::class,'info']);

Route::get('categories', [App\Http\Controllers\CategoryController::class,'list']);
Route::get('categories/{id}', [App\Http\Controllers\CategoryController::class,'info']);

Route::get('orders', [App\Http\Controllers\OrderController::class,'list']);
Route::get('orders/{id}', [App\Http\Controllers\OrderController::class,'info']);

Route::get('carts', [App\Http\Controllers\CartController::class,'list']);
Route::get('carts/{id}', [App\Http\Controllers\CartController::class,'info']);

Route::get('cart_items', [App\Http\Controllers\CartItemController::class,'list']);
Route::get('cart_items/{id}', [App\Http\Controllers\CartItemController::class,'info']);

Route::get('pers_infos', [App\Http\Controllers\PersInfoController::class,'list']);
Route::get('pers_infos/{id}', [App\Http\Controllers\PersInfoController::class,'info']);