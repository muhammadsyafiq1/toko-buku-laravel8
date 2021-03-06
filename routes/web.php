<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('book', App\Http\Controllers\BookController::class);
Route::get('user/restore/{id}', [App\Http\Controllers\UserController::class, 'restore'])->name('user.restore');
Route::get('user/forcedelete/{id}', [App\Http\Controllers\UserController::class, 'forceDelete'])->name('user.forceDelete');
Route::resource('user', App\Http\Controllers\UserController::class);
