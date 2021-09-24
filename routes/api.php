<?php

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

Route::get('/foods', [App\Http\Controllers\FoodController::class, 'index'])->name('foods');
Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('order');
Route::post('/order/{food}', [App\Http\Controllers\OrderController::class, 'placeOrder'])->name('food.order');
Route::post('/order/{order}/rating', [App\Http\Controllers\ReviewController::class, 'submitRating'])->name('order.rate');