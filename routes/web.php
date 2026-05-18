<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {

    return redirect('/login');

});

// LOGIN
Route::get('/login',
    [AuthController::class, 'login']);

Route::post('/login',
    [AuthController::class, 'authenticate']);

Route::post('/logout',
    [AuthController::class, 'logout']);


// DASHBOARD USER
Route::get('/user/dashboard', function () {

    return "Dashboard User";

});


// REGISTER
Route::get('/register',
    [AuthController::class, 'register']);

Route::post('/register',
    [AuthController::class, 'store']);