<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard.index');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/cast', [CastController::class, 'index']);
Route::get('/cast/create', [CastController::class, 'create'])->middleware('auth');
Route::post('/cast', [CastController::class, 'store']);
Route::get('/cast/{id}', [CastController::class, 'show']);
Route::get('/cast/{id}/edit', [CastController::class, 'edit'])->middleware('auth');
Route::put('/cast/{id}', [CastController::class, 'update']);
Route::delete('/cast/{id}', [CastController::class, 'destroy'])->middleware('auth');

Route::get('/genre', [GenreController::class, 'index']);
Route::get('/genre/create', [GenreController::class, 'create'])->middleware('auth');
Route::post('/genre', [GenreController::class, 'store']);
Route::get('/genre/{id}', [GenreController::class, 'show']);
Route::get('/genre/{id}/edit', [GenreController::class, 'edit'])->middleware('auth');
Route::put('/genre/{id}', [GenreController::class, 'update']);
Route::delete('/genre/{id}', [GenreController::class, 'destroy'])->middleware('auth');

Route::get('/movie', [MovieController::class, 'index']);
Route::get('/movie/create', [MovieController::class, 'create'])->middleware('auth');
Route::post('/movie', [MovieController::class, 'store']);
Route::get('/movie/{id}', [MovieController::class, 'show']);
Route::get('/movie/{id}/edit', [MovieController::class, 'edit'])->middleware('auth');
Route::put('/movie/{id}', [MovieController::class, 'update']);
Route::delete('/movie/{id}', [MovieController::class, 'destroy'])->middleware('auth');

Route::get('/comment', [CommentController::class, 'index']);
Route::get('/comment/create', [CommentController::class, 'create'])->middleware('auth');
Route::post('/comment', [CommentController::class, 'store']);
Route::get('/comment/{id}', [CommentController::class, 'show']);
Route::get('/comment/{id}/edit', [CommentController::class, 'edit'])->middleware('auth');
Route::put('/comment/{id}', [CommentController::class, 'update']);
Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->middleware('auth');