<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;

/*
|--------------------------------------------------------------------------
| Login
|--------------------------------------------------------------------------
*/

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| Produk
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/produk', [ProdukController::class, 'index']);

    Route::post('/produk', [ProdukController::class, 'store']);

    Route::put('/produk/{id}', [ProdukController::class, 'update']);

    Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])
        ->middleware('role:admin');

});