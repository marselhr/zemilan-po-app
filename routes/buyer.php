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
});

//route profile
Route::get('/profile', [App\Http\Controllers\Profile\ProfileController::class, 'index'])->name('mainprofile');
Route::post('/profile/save', [App\Http\Controllers\Profile\ProfileController::class, 'saveProfile'])->name('profileSave');

//route alamat
Route::get('/profile/alamat', [App\Http\Controllers\Profile\ProfileAlamatController::class, 'index'])->name('alamatprofile');
Route::get('/get-provinces', function () {
    $response = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json');
    return $response->json();
});

Route::get('/get-regencies/{provinceId}', function ($provinceId) {
    $response = Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/regencies/{$provinceId}.json");
    return $response->json();
});
Route::post('/profile/alamat/save', [App\Http\Controllers\Profile\ProfileAlamatController::class, 'saveAlamat'])->name('alamatSave');

