<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('home');

Route::get('/kategori', [App\Http\Controllers\MainController::class, 'kategori'])->name('kategori');
Route::post('/kategori', [App\Http\Controllers\MainController::class, 'saveKategori']);
Route::put('/kategori', [App\Http\Controllers\MainController::class, 'editKategori']);
Route::delete('/kategori/{id}', [App\Http\Controllers\MainController::class, 'deleteKategori']);

//AJAX
Route::post('/ajax_get_kategori', [App\Http\Controllers\MainController::class, 'getKategori']);
Route::post('/ajax_category_option', [App\Http\Controllers\MainController::class, 'optionKategori']);

Route::get('/transaksi', [App\Http\Controllers\MainController::class, 'transaksi'])->name('transaksi');
Route::post('/transaksi', [App\Http\Controllers\MainController::class, 'saveTransaksi']);
Route::get('/transaksi/{id}', [App\Http\Controllers\MainController::class, 'editTransaksi']);
Route::put('/transaksi', [App\Http\Controllers\MainController::class, 'updateTransaksi']);
Route::delete('/transaksi/{id}', [App\Http\Controllers\MainController::class, 'deleteTransaksi']);