<?php

use App\Http\Controllers\SchedulesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('schedules/by-barber/{barber}', [SchedulesController::class, 'byBarber'])->name('schedules.byBarber');