<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MountainController;
use App\Http\Controllers\LaporanController;
Route::get('/laporans/create/{id}',
    [LaporanController::class, 'create']);

Route::get('/', function () {
    return view('welcome');
   
});
 Route::resource('mountains', MountainController::class);
 Route::resource('laporans', LaporanController::class);