<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function(){

    Route::get('/register', [AuthController::class, 'index'])->name('register');

    Route::post('/register', [AuthController::class, 'store'])->name('register.save');
    
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    
    Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');