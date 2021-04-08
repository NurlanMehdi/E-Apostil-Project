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

Route::group(['middleware' => 'auth:web'],function (){
    Route::view('/', 'layouts/dashboard')->name('dashboard');
    Route::view('/add-apostil', 'layouts/addApostil')->name('add.apostil');
});

Route::view('/login', 'auth/login')->name('login')->middleware('guest');
Route::post('/login', [App\Http\Controllers\LoginController::class,'handleLogin'])->name('login.handle')->middleware('guest');
Route::post('/logout', [App\Http\Controllers\LoginController::class,'handleLogout'])->name('logout.handle');
