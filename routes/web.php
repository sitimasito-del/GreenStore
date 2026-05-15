<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MountainController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ArticleController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login']);

Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/dashboard', [AuthController::class, 'dashboard']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::resource('mountains', MountainController::class);

Route::get('/laporans/create/{id}',
    [LaporanController::class, 'create']);

Route::resource('laporans', LaporanController::class);

Route::resource('products', ProductController::class);

Route::post('/buy/{id}',
    [TransactionController::class, 'store']);

Route::resource('articles', ArticleController::class);