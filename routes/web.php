<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use Faker\Guesser\Name;
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

Route::get('/idea/{idea}', [IdeaController::class, 'show'])->name('idea.show');

Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('idea.edit');

Route::put('/{idea}/update', [IdeaController::class, 'update'])->name('idea.update');

Route::delete('/{id}', [IdeaController::class, 'delete'])->name('idea.destroy');

Route::POST('/ideas/{idea}/comment', [CommentController::class, 'store'])->name('idea.comment.store');

Route::get('/terms', function(){
    return view('terms');
});