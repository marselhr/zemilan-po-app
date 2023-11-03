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
Route::get('/profile', [App\Http\Controllers\Profile\ProfileController::class, 'index'])->name('mainprofile');
Route::post('/profile/save', [App\Http\Controllers\Profile\ProfileController::class, 'saveProfile'])->name('profileSave');



Route::fallback(function () {
    return view('fallback.notice');
})->name('fallback.route');

