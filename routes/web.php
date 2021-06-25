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
    Route::get('/admin', [App\Http\Controllers\ApostilController::class,'dashboard'])->name('dashboard');
    Route::get('admin/add-apostil/{id}', [App\Http\Controllers\ApostilController::class,'addApostil'])->name('add.apostil');
    Route::get('admin/data/user-types/{id}', [App\Http\Controllers\ApostilController::class,'getParticipantUserTypes'])->name('data.user.types');
    Route::get('admin/data/data-apostil-documents/{data}', [App\Http\Controllers\ApostilController::class,'getApostilDocuments'])->name('data.apostil.documents');
    Route::get('admin/excel-reader/{folder}/{name}',[App\Http\Controllers\ApostilController::class,'excelReader'])->name('excel.reader');
    Route::post('admin/apostil-create', [App\Http\Controllers\ApostilController::class,'createApostil'])->name('apostil.submit');
    Route::post('admin/apostil-edit/{id}', [App\Http\Controllers\ApostilController::class,'editApostil'])->name('apostil.edit');
    Route::get('admin/apostil-remove-document/{id}', [App\Http\Controllers\ApostilController::class,'deleteApostil'])->name('apostil.remove.document');
    Route::post('admin/signing-user-add', [App\Http\Controllers\ApostilController::class,'addSigningUser'])->name('signing.user.submit');
    Route::get('admin/remove-signing-user/{id}', [App\Http\Controllers\ApostilController::class,'removeSigningUser'])->name('remove.signing.user');

    Route::post('admin/apostil-user-create', [App\Http\Controllers\ApostilUserController::class,'createApostilUser'])->name('apostil.user.submit');

    Route::get('/admin/add-new-user', [App\Http\Controllers\UserController::class,'newUserPage'])->name('new.user.page');
    Route::get('/admin/add-new-apo-user-page/{id}', [App\Http\Controllers\UserController::class,'addNewUserPage'])->name('add.new.apo.user.page');
    Route::get('/admin/remove-user/{id}', [App\Http\Controllers\UserController::class,'removeUser'])->name('remove.user');
    Route::post('admin/user-create', [App\Http\Controllers\UserController::class,'createUser'])->name('user.submit');
    Route::post('admin/user-edit/{id}', [App\Http\Controllers\UserController::class,'editUser'])->name('user.edit');
});


Route::view('admin/login', 'auth/login')->name('login')->middleware('guest');
Route::post('admin/login', [App\Http\Controllers\LoginController::class,'handleLogin'])->name('login.handle')->middleware('guest');
Route::post('admin/logout', [App\Http\Controllers\LoginController::class,'handleLogout'])->name('logout.handle');

Route::get('/', function () {
    return view('layouts/user/searchApostil');
});

Route::get('/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'az'])) {
        abort(400);
    }

    App::setLocale($locale);
    return view('layouts/user/searchApostil');
})->name('changeLang');

Route::get('data/data-apostil-documents/{data}', [App\Http\Controllers\ApostilController::class,'searchApostil'])->name('user.data.apostil.documents');