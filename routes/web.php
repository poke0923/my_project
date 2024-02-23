<?php

use App\Http\Controllers\TopController;
use App\Http\Controllers\SampleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index']);
Route::get('/top', [TopController::class, 'index']);
Route::get('/sample', [SampleController::class, 'index']);
