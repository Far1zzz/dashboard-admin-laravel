<?php

use App\Http\Controllers\BupatiController;
use App\Http\Controllers\KominfoController;
use App\Http\Controllers\SekdaController;
use App\Http\Controllers\WabupController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


//kominfo
Route::middleware(['auth'])->group(function () {
    Route::get('/tamu-kominfo', [KominfoController::class, 'show'])->name('show-kominfo');
    Route::get('/cetak-kominfo', [KominfoController::class, 'cetak'])->name('cetak-kominfo');
    Route::post('/cetak-kominfo', [KominfoController::class, 'cetak']);
    Route::get('/cetak_all-kominfo', [KominfoController::class, 'cetak_all'])->name('cetak_all-kominfo');
    Route::get('/index-kominfo', [KominfoController::class, 'index'])->name('dashboard-kominfo');
    Route::get('/detail-kominfo/{id}', [KominfoController::class, 'detail'])->name('detail-kominfo');
    Route::get('/fe-kominfo', [KominfoController::class, 'dashboard'])->name('fe-kominfo');
});

//sekda
Route::middleware(['auth'])->group(function () {
    Route::get('/tamu-setda', [SekdaController::class, 'show'])->name('show-setda');
    Route::get('/cetak-setda', [SekdaController::class, 'cetak'])->name('cetak-setda');
    Route::post('/cetak-setda', [SekdaController::class, 'cetak']);
    Route::get('/cetak_all-setda', [SekdaController::class, 'cetak_all'])->name('cetak_all-setda');
    Route::get('/index-setda', [SekdaController::class, 'index'])->name('dashboard-setda');
    Route::get('/detail-setda/{id}', [SekdaController::class, 'detail'])->name('detail-setda');
    Route::get('/fe-setda', [SekdaController::class, 'dashboard'])->name('fe-setda');
});

//bupati
Route::middleware(['auth'])->group(function () {
    Route::get('/tamu-bupati', [BupatiController::class, 'show'])->name('show-bupati');
    Route::get('/cetak-bupati', [BupatiController::class, 'cetak'])->name('cetak-bupati');
    Route::post('/cetak-bupati', [BupatiController::class, 'cetak']);
    Route::get('/cetak_all-bupati', [BupatiController::class, 'cetak_all'])->name('cetak_all-bupati');
    Route::get('/index-bupati', [BupatiController::class, 'index'])->name('dashboard-bupati');
    Route::get('/detail-bupati/{id}', [BupatiController::class, 'detail'])->name('detail-bupati');
    Route::get('/fe-bupati', [BupatiController::class, 'dashboard'])->name('fe-bupati');
});

//wabup
Route::middleware(['auth'])->group(function () {
    Route::get('/tamu-wabup', [WabupController::class, 'show'])->name('show-wabup');
    Route::get('/cetak-wabup', [WabupController::class, 'cetak'])->name('cetak-wabup');
    Route::post('/cetak-wabup', [WabupController::class, 'cetak']);
    Route::get('/cetak_all-wabup', [WabupController::class, 'cetak_all'])->name('cetak_all-wabup');
    Route::get('/index-wabup', [WabupController::class, 'index'])->name('dashboard-wabup');
    Route::get('/detail-wabup/{id}', [WabupController::class, 'detail'])->name('detail-wabup');
    Route::get('/fe-wabup', [WabupController::class, 'dashboard'])->name('fe-wabup');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/get-latest-data-bupati', [BupatiController::class, 'getLatestData']);
Route::get('/get-latest-data-kominfo', [KominfoController::class, 'getLatestData']);
Route::get('/get-latest-data-setda', [SekdaController::class, 'getLatestData']);
Route::get('/get-latest-data-wabup', [SekdaController::class, 'getLatestData']);
