<?php

use App\Http\Controllers\BupatiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KominfoController;
use App\Http\Controllers\SekdaController;
use App\Http\Controllers\WabupController;

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

Route::middleware(['cors'])->group(function () {
    Route::post('/tamus-kominfo', [KominfoController::class, 'store'])->name('store');
    Route::get('/tamu-kominfo', [KominfoController::class, 'index'])->name('index');
    Route::post('/tamus-setda', [SekdaController::class, 'store'])->name('store');
    Route::get('/tamu-setda', [SekdaController::class, 'index'])->name('index');
    Route::post('/tamus-bupati', [BupatiController::class, 'store'])->name('store');
    Route::get('/tamu-bupati', [BupatiController::class, 'index'])->name('index');
    Route::post('/tamus-wabup', [WabupController::class, 'store'])->name('store');
    Route::get('/tamu-wabup', [WabupController::class, 'index'])->name('index');
});
