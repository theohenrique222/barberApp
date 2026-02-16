<?php

use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\BarbersController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::resource('services', ServicesController::class);
    Route::resource('barbers', BarbersController::class);
    Route::resource('appointments', AppointmentsController::class);
});
