<?php

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\BarbersController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('auth.admin.dashboard');
    })->name('dashboard');
    Route::get('/clients', ClientsController::class, 'index')->name('clients');
    Route::resource('users', UserController::class);
    Route::resource('services', ServicesController::class);
    Route::resource('barbers', BarbersController::class);
    Route::resource('appointments', AppointmentsController::class);
    Route::resource('schedules', AppointmentsController::class);
});
