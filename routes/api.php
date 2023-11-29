<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// // API Barang
Route::get('/getBarangs', [BarangController::class, 'getData']);
Route::post('/storeBarang', [BarangController::class, 'store']);
Route::put('/editBarang/{id}', [BarangController::class, 'update']);
Route::delete('/deleteBarang/{id}', [BarangController::class, 'destroy']);
