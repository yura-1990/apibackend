<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WorkerController;

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::controller(WorkerController::class)->group(function () {
    Route::get('workers', 'index');
    Route::post('workers', 'store');
    Route::get('worker/{id}', 'show');
    Route::put('worker/{id}', 'update');
    Route::delete('worker/{id}', 'destroy');
});
