<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KabarController;
use App\Http\Controllers\SabarController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;

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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('supplier', SupplierController::class);
Route::resource('sabar', SabarController::class);
Route::resource('kabar', KabarController::class);
Route::resource('data_barang', BarangController::class);
