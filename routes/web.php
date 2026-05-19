<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MountainController;
use App\Http\Controllers\LaporanController;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    return redirect('/login');

});


// ================= LOGIN =================

Route::get('/login', [AuthController::class, 'login']);

Route::post('/login', [AuthController::class, 'authenticate']);

Route::post('/logout', [AuthController::class, 'logout']);


// ================= REGISTER =================

Route::get('/register', [AuthController::class, 'register']);

Route::post('/register', [AuthController::class, 'store']);


// ================= DASHBOARD =================

Route::get('/user/dashboard', function () {

    return view('user.dashboard');

});


// ================= MOUNTAINS =================

Route::get('/mountains',
    [MountainController::class, 'index']);


// ================= LAPORAN =================

Route::get('/laporan/create/{id}',
    [LaporanController::class, 'create']);

Route::post('/laporan/store',
    [LaporanController::class, 'store']);