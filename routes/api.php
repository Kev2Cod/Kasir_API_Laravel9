<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\PelangganController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Pelanggan
Route::get('/pelanggan', [PelangganController::class, 'index']);
Route::post('/pelanggan', [PelangganController::class, 'store']);
Route::get('/pelanggan/{id}', [PelangganController::class, 'show']);
Route::put('/pelanggan/{id}', [PelangganController::class, 'update']);
Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy']); 

// // Barang 
// Route::get('/barang', [BarangController::class, 'index']);
// Route::post('/barang/post', [BarangController::class, 'store']);
// Route::get('/barang/{id}', [BarangController::class, 'show']);
// Route::put('/barang/{id}', [BarangController::class, 'update']);
// Route::delete('/barang/{id}', [BarangController::class, 'destroy']);

// // Penjualan
// Route::get('/penjualan', [PenjualanController::class, 'index']);
// Route::post('/penjualan/post', [PenjualanController::class, 'store']);
// Route::get('/penjualan/{id}', [PenjualanController::class, 'show']);
// Route::put('/penjualan/{id}', [PenjualanController::class, 'update']);
// Route::delete('/penjualan/{id}', [PenjualanController::class, 'destroy']);


// // Item Penjualan 
// Route::get('/item-penjualan', [ItemPenjualanController::class, 'index']);
// Route::post('/item-penjualan/post', [ItemPenjualanController::class, 'store']);
// Route::get('/item-penjualan/{id}', [ItemPenjualanController::class, 'show']);
// Route::put('/item-penjualan/{id}', [ItemPenjualanController::class, 'update']);
// Route::delete('/item-penjualan/{id}', [ItemPenjualanController::class, 'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
