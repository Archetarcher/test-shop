<?php

use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Product\CategoryController;
use App\Http\Controllers\Product\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categories', [CategoryController::class, 'categoryTree']);
Route::get('/products', [ProductController::class, 'get']);

Route::prefix('products')->group(function (){
//    Route::get('/', [ProductController::class, 'get']);
    Route::post('/store', [ProductController::class, 'create']);
    Route::get('/{slug}', [ProductController::class, 'getBySlug']);

});

Route::prefix('orders')->group(function (){
    Route::get('/user', [OrderController::class, 'getOrders']);
    Route::get('/products', [OrderController::class, 'getOrderProducts']);
    Route::post('/confirm', [OrderController::class, 'confirmOrder']);

});

