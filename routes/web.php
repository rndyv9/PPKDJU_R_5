<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BelajarController;
use App\Http\Controllers\Admin\StudentController;

Route::resource('/', \App\Http\Controllers\HomeController::class);
Route::get('dashboard',[\App\Http\Controllers\AdminController::class, 'index'])->name('admin');

// GET, POST, PUT, PATCH, DELETE
//GET : Hanya membaca atau melihat, tidak ada aksi request ke form
//POST: Request ke dalam server menggunakan form
//PUT: Request ke dalam server menggunakan form dengan diperuntukkan untuk update dan data banyak
//PATCH: Request ke dalam server menggunakan form dengan diperuntukkan untuk update dan hanya satu kolum di update
//DELETE: Request ke dalam server menggunakan form untuk menghapus

Route::get('belajar-laravel',[BelajarController::class, 'index'])->name('belajar-laravel');
Route::get('penjumlahan',[BelajarController::class, 'tambah'])->name('penjumlahan');
Route::post('store-tambah',[BelajarController::class, 'storeTambah'])->name('store-tambah');
Route::get('pengurangan',[BelajarController::class, 'kurang'])->name('pengurangan');
Route::post('store-kurang',[BelajarController::class, 'storeKurang'])->name('store-kurang');
Route::get('perkalian',[BelajarController::class, 'kali'])->name('perkalian');
Route::post('store-kali',[BelajarController::class, 'storeKali'])->name('store-kali');
Route::get('pembagian',[BelajarController::class, 'bagi'])->name('pembagian');
Route::post('store-bagi',[BelajarController::class, 'storeBagi'])->name('store-bagi');

//PREFIX
Route::get('login', [\App\Http\Controllers\LoginController::class, 'login']);
Route::post('action-login', [\App\Http\Controllers\LoginController::class, 'actionLogin'])->name('action-login');
Route::prefix('admin')->group(function() {
    Route::resource('/dashboard',   \App\Http\Controllers\Admin\DashboardController::class);
});

// Student
Route::get('student', [StudentController::class, 'index'])->name('student');
Route::post('student/simpan', [StudentController::class, 'simpan']);
Route::post('student/update/{id}', [StudentController::class, 'update']);
Route::get('student/hapus/{id}', [StudentController::class, 'hapus']);
