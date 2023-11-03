<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ManajemenUserController;
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web"  middleware group and "is.admin" middleware. Make something great!
|
*/

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is.admin']], function () {
    Route::get('dashboard', function () {
        return view('admin.pages.dashboard.index');
    })->name('admin.dashboard');
    Route::get('/users', [ManajemenUserController::class, 'index'])->name('admin.user.index');
    Route::get('/users/{user}', [ManajemenUserController::class, 'show'])->name('admin.user.show');
});
