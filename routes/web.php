<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\AuthController;
use Faker\Guesser\Name;
use GuzzleHttp\Middleware;
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

Route::group(['prefix'=> 'ideas/', 'as'=>'idea.', 'middleware'=>['auth']], function (){

    Route::post('', [IdeaController::class, 'store'])->name('store')->withoutMiddleware('auth');

    Route::get('show/{idea}', [IdeaController::class, 'show'])->name('show')->withoutMiddleware('auth');
    
    Route::get('{idea}/edit', [IdeaController::class, 'edit'])->name('edit');
    
    Route::put('{idea}/update', [IdeaController::class, 'update'])->name('update');
    
    Route::delete('{id}', [IdeaController::class, 'delete'])->name('destroy');
    
    Route::POST('{idea}/comment', [CommentController::class, 'store'])->name('comment.store'); 

});

