<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SepatuController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\UserController;

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
Route::get('/', [WelcomeController::class, 'index']);

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']);              // Menampilkan halaman awal user
    Route::post('/list', [UserController::class, 'list']);          // Menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create_ajax', [UserController::class, 'create_ajax']);    // Menampilkan halaman form tambah user Ajax
    Route::post('/ajax', [UserController::class, 'store_ajax']);          // Menyimpan data user baru Ajax
    Route::get('/{id}/show_ajax', [UserController::class, 'show_ajax']);     // Menampilkan halaman form user Ajax
    Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']);     // Menampilkan halaman form edit user Ajax
    Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']);  // Menyimpan perubahan data user Ajax
    Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete user Ajax
    Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']); // Untuk hapus data user Ajax
    Route::delete('/{id}', [UserController::class, 'destroy']);     // Menghapus data user
});

Route::group(['prefix' => 'level'], function () {
    Route::get('/', [LevelController::class, 'index']);              // Menampilkan halaman awal level
    Route::post('/list', [LevelController::class, 'list']);          // Menampilkan data level dalam bentuk json untuk datatables
    Route::get('/create_ajax', [LevelController::class, 'create_ajax']);    // Menampilkan halaman form tambah level Ajax
    Route::post('/ajax', [LevelController::class, 'store_ajax']);          // Menyimpan data level baru Ajax
    Route::get('/{id}/show_ajax', [LevelController::class, 'show_ajax']);     // Menampilkan halaman form level Ajax
    Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']);     // Menampilkan halaman form edit level Ajax
    Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']);  // Menyimpan perubahan data level Ajax
    Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete level Ajax
    Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']); // Untuk hapus data level Ajax
    Route::delete('/{id}', [LevelController::class, 'destroy']);     // Menghapus data level
});

Route::group(['prefix' => 'kategori'], function () {
    Route::get('/', [KategoriController::class, 'index']);              // Menampilkan halaman awal kategori
    Route::post('/list', [KategoriController::class, 'list']);          // Menampilkan data kategori dalam bentuk json untuk datatables
    Route::get('/create_ajax', [KategoriController::class, 'create_ajax']);    // Menampilkan halaman form tambah kategori Ajax
    Route::post('/ajax', [KategoriController::class, 'store_ajax']);          // Menyimpan data kategori baru Ajax
    Route::get('/{id}/show_ajax', [KategoriController::class, 'show_ajax']);     // Menampilkan halaman form kategori Ajax
    Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']);     // Menampilkan halaman form edit kategori Ajax
    Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']);  // Menyimpan perubahan data kategori Ajax
    Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete kategori Ajax
    Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']); // Untuk hapus data kategori Ajax
    Route::delete('/{id}', [KategoriController::class, 'destroy']);     // Menghapus data kategori
});

Route::group(['prefix' => 'supplier'], function () {
    Route::get('/', [SupplierController::class, 'index']);              // Menampilkan halaman awal supplier
    Route::post('/list', [SupplierController::class, 'list']);          // Menampilkan data supplier dalam bentuk json untuk datatables
    Route::get('/create_ajax', [SupplierController::class, 'create_ajax']);    // Menampilkan halaman form tambah supplier Ajax
    Route::post('/ajax', [SupplierController::class, 'store_ajax']);          // Menyimpan data supplier baru Ajax
    Route::get('/{id}/show_ajax', [SupplierController::class, 'show_ajax']);     // Menampilkan halaman form supplier Ajax
    Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']);     // Menampilkan halaman form edit supplier Ajax
    Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']);  // Menyimpan perubahan data supplier Ajax
    Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete supplier Ajax
    Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']); // Untuk hapus data supplier Ajax
    Route::delete('/{id}', [SupplierController::class, 'destroy']);     // Menghapus data supplier
});

Route::group(['prefix' => 'sepatu'], function () {
    Route::get('/', [SepatuController::class, 'index']);              // Menampilkan halaman awal Sepatu
    Route::post('/list', [SepatuController::class, 'list']);          // Menampilkan data Sepatu dalam bentuk json untuk datatables
    Route::get('/create_ajax', [SepatuController::class, 'create_ajax']);    // Menampilkan halaman form tambah Sepatu Ajax
    Route::post('/ajax', [SepatuController::class, 'store_ajax']);          // Menyimpan data Sepatu baru Ajax
    Route::get('/{id}/show_ajax', [SepatuController::class, 'show_ajax']);     // Menampilkan halaman form Sepatu Ajax
    Route::get('/{id}/edit_ajax', [SepatuController::class, 'edit_ajax']);     // Menampilkan halaman form edit Sepatu Ajax
    Route::put('/{id}/update_ajax', [SepatuController::class, 'update_ajax']);  // Menyimpan perubahan data Sepatu Ajax
    Route::get('/{id}/delete_ajax', [SepatuController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete Sepatu Ajax
    Route::delete('/{id}/delete_ajax', [SepatuController::class, 'delete_ajax']); // Untuk hapus data Sepatu Ajax
    Route::delete('/{id}', [SepatuController::class, 'destroy']);     // Menghapus data Sepatu
});