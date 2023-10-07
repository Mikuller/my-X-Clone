<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\AuthController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/', [IdeaController::class, 'store'])->name('idea.store');

Route::get('/show/{idea}', [IdeaController::class, 'show'])->name('idea.show')->middleware('auth');

Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('idea.edit')->middleware('auth');

Route::put('/{idea}/update', [IdeaController::class, 'update'])->name('idea.update')->middleware('auth');

Route::delete('/{id}', [IdeaController::class, 'delete'])->name('idea.destroy')->middleware('auth');

Route::POST('/ideas/{idea}/comment', [CommentController::class, 'store'])->name('idea.comment.store');

Route::get('/register', [AuthController::class, 'index'])->name('register');

Route::post('/register', [AuthController::class, 'store'])->name('register.save');

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/terms', function(){
    return view('terms');
});