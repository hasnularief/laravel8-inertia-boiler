<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ArticleController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::prefix('/b')->namespace('App\Http\Controllers')->group(function(){
    Route::get('/', 'DashboardController@read')->name('dashboard');

    Route::get('/users', 'UsersController@read')->name('users');
    Route::post('/users', 'UsersController@write')->name('users.write');
});

Route::get('/article', [ArticleController::class, 'index']);
Route::post('/article', [ArticleController::class, 'store']);
Route::patch('/article/edit/{id}', [ArticleController::class, 'update']);
Route::delete('/article/delete/{id}', [ArticleController::class, 'delete']);

