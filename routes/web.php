<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TopController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index']);
Route::get('/top', [TopController::class, 'index']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/login/register', [LoginController::class, 'register']);
Route::get('/login/unregister', [LoginController::class, 'unregister']);
