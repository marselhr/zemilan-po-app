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
    Route::prefix('users/{user}')->group(function () {
        Route::get('/', [ManajemenUserController::class, 'show'])->name('admin.user.show');
        Route::get('/edit', [ManajemenUserController::class, 'edit'])->name('admin.user.edit');
        Route::post('/update', [ManajemenUserController::class, 'update'])->name('admin.user.update');
        Route::get('/invoice', [ManajemenUserController::class, 'invoice'])->name('admin.user.show.invoice');
        Route::delete('/delete', [ManajemenUserController::class, 'destroy'])->name('admin.user.delete');
    });

    // category
    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::put('/category/destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
});
