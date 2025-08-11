<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseSessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('courses', CourseController::class);
Route::resource('session', CourseSessionController::class);
