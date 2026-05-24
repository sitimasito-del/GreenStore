<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MountainController;
use App\Http\Controllers\LaporanController;

//
// ================= HOME =================
//

Route::get('/', function () {

    return redirect('/login');

});


//
// ================= AUTH =================
//

Route::get('/register', [

    AuthController::class,
    'register'

]);

Route::post('/register/store', [

    AuthController::class,
    'storeRegister'

]);

Route::get('/login', [

    AuthController::class,
    'login'

]);

Route::post('/login', [

    AuthController::class,
    'authLogin'

]);

Route::get('/logout', [

    AuthController::class,
    'logout'

]);


//
// ================= USER =================
//

Route::get('/user/dashboard', [

    MountainController::class,
    'index'

]);

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


//
// ================= ADMIN =================
//

Route::get('/admin/dashboard', [

    AdminController::class,
    'dashboard'

]);

Route::get('/admin/laporans', [

    AdminController::class,
    'laporans'

]);

Route::get('/admin/mountains', [

    AdminController::class,
    'mountains'

]);

Route::get('/admin/mountains/create', [

    AdminController::class,
    'createMountain'

]);

Route::post('/admin/mountains/store', [

    AdminController::class,
    'storeMountain'

]);

Route::post('/admin/laporan/update-status/{id}', [

    AdminController::class,
    'updateStatus'

]);