<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BelajarController;
use App\Http\Controllers\Admin\StudentController;

Route::resource('/', \App\Http\Controllers\HomeController::class);

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

Route::get('login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('action-login', [\App\Http\Controllers\LoginController::class, 'actionLogin'])->name('action-login');
Route::get('register', [App\Http\Controllers\RegisterController::class, 'register'])->name('register');
Route::post('action-register', [App\Http\Controllers\RegisterController::class, 'actionRegister'])->name('action-register');
Route::get('logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

Route::post('/contact-submit', [\App\Http\Controllers\Admin\ContactController::class, 'store'])->name('contact.submit');

Route::get('detail/{id}', [App\Http\Controllers\DetailController::class, 'index'])->name('detail');

// Admin
Route::prefix('admin')->middleware('auth')->group(function() {
    Route::resource('dashboard', \App\Http\Controllers\Admin\DashboardController::class);

    //Student
    Route::prefix('student')->group(function() {
        Route::get('', [StudentController::class, 'index'])->name('student');
        Route::post('simpan', [StudentController::class, 'simpan'])->name('student.simpan');
        Route::post('update/{id}', [StudentController::class, 'update'])->name('student.update');
        Route::get('hapus/{id}', [StudentController::class, 'hapus'])->name('student.hapus');
    });

    Route::get('logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
    Route::resource('contact', \App\Http\Controllers\Admin\ContactController::class);
    Route::resource('blog', \App\Http\Controllers\Admin\BlogController::class);
});
// Route::get('dashboard',[\App\Http\Controllers\AdminController::class, 'index'])->name('admin');

// Donut V
Route::get('donut', [App\Http\Controllers\DonutController::class, 'index']);
