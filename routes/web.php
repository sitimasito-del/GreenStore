<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MountainController;

Route::get('/', function () {
    return view('welcome');
   
});
 Route::resource('mountains', MountainController::class);