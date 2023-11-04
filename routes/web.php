<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');

//route profile
Route::get('/profile', [App\Http\Controllers\Profile\ProfileController::class, 'index'])->name('mainprofile');
Route::post('/profile/save', [App\Http\Controllers\Profile\ProfileController::class, 'saveProfile'])->name('profileSave');

//route alamat
Route::get('/profile/alamat', [App\Http\Controllers\Profile\ProfileAlamatController::class, 'index'])->name('alamatprofile');
Route::get('/get-provinces', function () {
    $response = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json');
    $provisi = $response->json();

    return response()->json($provisi);
});
Route::post('/profile/alamat/save', [App\Http\Controllers\Profile\ProfileAlamatController::class, 'saveAlamat'])->name('alamatSave');





Route::fallback(function () {
    return view('fallback.notice');
})->name('fallback.route');

