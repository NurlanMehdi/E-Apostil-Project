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

Route::view('/dashboard', 'layouts/dashboard');
Route::view('/login', 'auth/login');
//
//Route::get('/login','LoginController@login_form')->name('login');
//Route::get('/dashboard','ApostilDashboardController@dashboard_form')->name('dashboard');