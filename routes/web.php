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
    Route::get('/', [App\Http\Controllers\ApostilController::class,'dashboard'])->name('dashboard');
    Route::get('/add-apostil', [App\Http\Controllers\ApostilController::class,'addApostil'])->name('add.apostil');
    Route::get('data/user-types/{id}', [App\Http\Controllers\ApostilController::class,'getParticipantUserTypes'])->name('data.user.types');
    Route::get('data/data-apostil-documents/{data}', [App\Http\Controllers\ApostilController::class,'getApostilDocuments'])->name('data.apostil.documents');
    Route::post('apostil-create', [App\Http\Controllers\ApostilController::class,'createApostil'])->name('apostil.submit');
    Route::get('apostil-remove-document/{id}', [App\Http\Controllers\ApostilController::class,'deleteApostil'])->name('apostil.remove.document');
});


Route::view('/login', 'auth/login')->name('login')->middleware('guest');
Route::post('/login', [App\Http\Controllers\LoginController::class,'handleLogin'])->name('login.handle')->middleware('guest');
Route::post('/logout', [App\Http\Controllers\LoginController::class,'handleLogout'])->name('logout.handle');
