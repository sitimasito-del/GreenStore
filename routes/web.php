<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MountainController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ArticleController;


//
// ================= HOME =================
//

Route::get('/', [

    MountainController::class,
    'dashboard'

]);

//
// ================= DASHBOARD =================
//

Route::get('/dashboard', [

    MountainController::class,
    'dashboard'

]);

Route::get('/mountain/{id}', [

    MountainController::class,
    'detail'

]);

//
// ================= AUTH =================
//

Route::get('/login', [

    AuthController::class,
    'login'

]);

Route::post('/login', [

    AuthController::class,
    'authLogin'

]);

Route::get('/register', [

    AuthController::class,
    'register'

]);

Route::post('/register/store', [

    AuthController::class,
    'storeRegister'

]);

Route::get('/logout', [

    AuthController::class,
    'logout'

]);

Route::get('/profile', [

    AuthController::class,
    'profile'

]);

//
// ================= LAPORAN =================
//

Route::get('/laporan/create/{id}', [

    LaporanController::class,
    'create'

]);

Route::post('/laporan/store', [

    LaporanController::class,
    'store'

]);

Route::get('/riwayat', [

    LaporanController::class,
    'riwayat'

]);

Route::delete('/laporan/hapus/{id}', [

    LaporanController::class,
    'destroy'

]);

//
// ================= ADMIN =================
//

// DASHBOARD ADMIN PUSAT

Route::get('/admin/dashboard', [

    AdminController::class,
    'dashboard'

]);

// ADMIN GUNUNG

Route::get('/admin/laporans', [

    AdminController::class,
    'laporans'

]);

// DAFTAR GUNUNG

Route::get('/admin/mountains', [

    AdminController::class,
    'mountains'

]);

// TAMBAH GUNUNG

Route::get('/admin/mountains/create', [

    AdminController::class,
    'createMountain'

]);

Route::post('/admin/mountains/store', [

    AdminController::class,
    'storeMountain'

]);

// EDIT GUNUNG

Route::get('/admin/mountain/edit/{id}', [

    AdminController::class,
    'editMountain'

]);

Route::post('/admin/mountain/update/{id}', [

    AdminController::class,
    'updateMountain'

]);

// UPDATE STATUS LAPORAN

Route::post('/admin/laporan/update-status/{id}', [

    AdminController::class,
    'updateStatus'

]);
// ================= ARTIKEL =================
//

Route::get('/artikel', [

    ArticleController::class,
    'index'

])->name('artikel.index');

Route::get('/artikel/baca/{id}', [

    ArticleController::class,
    'read'

])->name('artikel.read');
Route::get('/admin/articles', [

    AdminController::class,
    'articles'

]);

Route::get('/tesartikel', function () {
    return 'TES ARTIKEL BERHASIL';
});
