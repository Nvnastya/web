<?php

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

Route::prefix('products')->group(function(){
    Route::get('/', [App\Http\Controllers\ProductController::class, 'list']);
    Route::get('/gift', [App\Http\Controllers\ProductController::class,'gift']);
    Route::get('/{id}', [App\Http\Controllers\ProductController::class, 'info']);
    Route::post('/', [App\Http\Controllers\ProductController::class, 'create']);
    Route::put('/{id}', [App\Http\Controllers\ProductController::class, 'update']);
    Route::delete('/{id}', [App\Http\Controllers\ProductController::class, 'delete']);
});

Route::prefix('categories')->group(function(){
    Route::get('', [App\Http\Controllers\CategoryController::class, 'list']);
    Route::get('{id}', [App\Http\Controllers\CategoryController::class, 'info']);
    Route::post('', [App\Http\Controllers\CategoryController::class, 'create']);
    Route::put('{id}', [App\Http\Controllers\CategoryController::class, 'update']);
    Route::delete('{id}', [App\Http\Controllers\CategoryController::class, 'delete']);
});

Route::prefix('orders')->group(function(){
    Route::get('', [App\Http\Controllers\OrderController::class, 'list']);
    Route::get('{id}', [App\Http\Controllers\OrderController::class, 'info']);
    Route::post('', [App\Http\Controllers\OrderController::class, 'create']);
    Route::put('{id}', [App\Http\Controllers\OrderController::class, 'update']);
    Route::delete('{id}', [App\Http\Controllers\OrderController::class, 'delete']);
});

Route::prefix('carts')->group(function(){
    Route::get('', [App\Http\Controllers\CartController::class, 'list']);
    Route::get('{id}', [App\Http\Controllers\CartController::class, 'info']);
    Route::post('', [App\Http\Controllers\CartController::class, 'create']);
    Route::put('{id}', [App\Http\Controllers\CartController::class, 'update']);
    Route::delete('{id}', [App\Http\Controllers\CartController::class, 'delete']);
});

Route::prefix('cart_items')->group(function(){
    Route::get('', [App\Http\Controllers\CartItemController::class, 'list']);
    Route::get('{id}', [App\Http\Controllers\CartItemController::class, 'info']);
    Route::post('', [App\Http\Controllers\CartItemController::class, 'create']);
    Route::put('{id}', [App\Http\Controllers\CartItemController::class, 'update']);
    Route::delete('{id}', [App\Http\Controllers\CartItemController::class, 'delete']);
});

Route::prefix('pers_infos')->group(function(){
    Route::get('', [App\Http\Controllers\PersInfoController::class, 'list']);
    Route::get('{id}', [App\Http\Controllers\PersInfoController::class, 'info']);
    Route::post('', [App\Http\Controllers\PersInfoController::class, 'create']);
    Route::put('{id}', [App\Http\Controllers\PersInfoController::class, 'update']);
    Route::delete('{id}', [App\Http\Controllers\PersInfoController::class, 'delete']);
});

Route::prefix('login')->group(function(){
    Route::post('', [App\Http\Controllers\AuthController::class, 'login']);
});

Route::prefix('register')->group(function(){
    Route::post('', [App\Http\Controllers\RegisterController::class, 'register']);
});