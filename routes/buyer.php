<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


?>