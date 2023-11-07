<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartItemController;


/*
|--------------------------------------------------------------------------
| Buyer Routes
|--------------------------------------------------------------------------
|
| Here is where you can register buyer web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web"  middleware group and "auth" middleware. Make something great!
|
*/

Route::group(['middleware' => ['auth']], function () {
    Route::get('/cart', [CartItemController::class, 'index'])->name('buyer.cart');
    Route::get('/checkout/{items}', [CartItemController::class, 'checkout'])->name('buyer.checkout');
    Route::get('/order', [CartItemController::class, 'showOrder'])->name('buyer.orders');
});
