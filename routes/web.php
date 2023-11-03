<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FeedController;
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

Route::resource('idea',IdeaController::class)->except(['index','create','show'])->middleware('auth');

Route::resource('idea',IdeaController::class)->only(['show']);

Route::resource('idea.comment', CommentController::class)->only('store')->middleware('auth');

Route::resource('user', UserController::class)->only('show','edit','update')->middleware('auth');

Route::post('users/{user}/follow', [UserController::class, 'follow'])->name('user.follow')->middleware('auth');

Route::post('users/{user}/unfollow', [UserController::class, 'unfollow'])->name('user.unfollow')->middleware('auth');


Route::get('ideas/{idea}/like', [IdeaController::class, 'like'])->name('idea.like')->middleware('auth');

Route::get('ideas/{idea}/unlike', [IdeaController::class, 'unlike'])->name('idea.unlike')->middleware('auth');

Route::get('/feed', FeedController::class)->middleware('auth')->name('feed');


Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware(['auth','admin']);

Route::get('/terms', function (){
    return view('terms');
})->name('terms')->middleware('auth');