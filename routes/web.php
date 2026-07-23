<?php

use Illuminate\Support\Facades\Route;

Route::resource('/', \App\Http\Controllers\HomeController::class );
Route::get('admin',[\App\Http\Controllers\AdminController::class, 'index'])->name('admin');

// GET, POST, PUT, PATCH, DELETE
//GET : Hanya membaca atau melihat, tidak ada aksi request ke form
//POST: Request ke dalam server menggunakan form
//PUT: Request ke dalam server menggunakan form dengan diperuntukkan untuk update dan data banyak
//PATCH: Request ke dalam server menggunakan form dengan diperuntukkan untuk update dan hanya satu kolum di update
//DELETE: Request ke dalam server menggunakan form untuk menghapus

Route::get('belajar-laravel',[\App\Http\Controllers\BelajarController::class, 'index'])->name('belajar-laravel');
Route::get('penjumlahan',[\App\Http\Controllers\BelajarController::class, 'tambah'])->name('penjumlahan');
Route::post('store-tambah',[\App\Http\Controllers\BelajarController::class, 'storeTambah'])->name('store-tambah');
Route::get('pengurangan',[\App\Http\Controllers\BelajarController::class, 'kurang'])->name('pengurangan');
Route::post('store-kurang',[\App\Http\Controllers\BelajarController::class, 'storeKurang'])->name('store-kurang');
Route::get('perkalian',[\App\Http\Controllers\BelajarController::class, 'kali'])->name('perkalian');
Route::post('store-kali',[\App\Http\Controllers\BelajarController::class, 'storeKali'])->name('store-kali');
Route::get('pembagian',[\App\Http\Controllers\BelajarController::class, 'bagi'])->name('pembagian');
Route::post('store-bagi',[\App\Http\Controllers\BelajarController::class, 'storeBagi'])->name('store-bagi');

//PREFIX
Route::get('login', [\App\Http\Controllers\LoginController::class, 'login']);
Route::post('action-login', [\App\Http\Controllers\LoginController::class, 'actionLogin'])->name('action-login');
Route::prefix('admin')->group(function() {
    Route::resource('/dashboard', \App\Http\Controllers\Admin\DashboardController::class);
});
