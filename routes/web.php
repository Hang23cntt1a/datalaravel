<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/carlist', [CarController::class, 'index'])->name("car.index");
Route::resource('cars', CarController::class);
