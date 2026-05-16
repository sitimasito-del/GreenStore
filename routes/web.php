<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MountainController;

Route::get('/', function () {

    return view('welcome');

});


// ================= LOGIN =================

Route::get('/login',
    [AuthController::class, 'login']);

Route::post('/login',
    [AuthController::class, 'authenticate']);

Route::post('/logout',
    [AuthController::class, 'logout']);


// ================= USER =================

Route::get('/user/dashboard', function () {

    return view('user.dashboard');

});


// ================= ADMIN =================

Route::get('/admin/dashboard', function () {

    return view('admin.dashboard');

});


// ================= MARKETPLACE =================

Route::resource('products',
    ProductController::class);


// ================= LAPORAN =================

Route::get('/laporans',
    [LaporanController::class, 'index']);

Route::get('/buat-laporan/{id}',
    [LaporanController::class, 'create']);

Route::post('/laporans/store',
    [LaporanController::class, 'store']);

Route::get('/laporans', function () {
    return view('laporans.index');
});


// ================= EDUKASI =================

Route::resource('articles',
    ArticleController::class);