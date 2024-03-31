<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\profileController;
use App\Http\Controllers\Admin\{adminController,dashboardController};
use App\Http\Controllers\cabangController;
use App\Http\Controllers\jobController;
use App\Http\Controllers\relateController;

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

require __DIR__.'/auth.php';

Route::get('error-page', [dashboardController::class,'error'])->name('error');

Route::group(['middleware' => 'auth', 'PreventBackHistory'], function () {

// dashboard
Route::get('/', [dashboardController::class, 'index'])->name('dashboard');

// profile
Route::get('/profile/{encryptedId}/edit' ,[profileController::class, 'index'])->name('profile.index');
Route::put('/profile/password-update' ,[profileController::class, 'updatePassword'])->name('profile.updatePassword');
Route::put('/profile/{id}' ,[profileController::class, 'update'])->name('profile.update');



Route::middleware(['cekLevel'])->group( function(){

// crud admin
Route::resource('/admin', adminController::class);
// crud cabang
Route::resource('cabang', cabangController::class);

});

// job
Route::resource('job', jobController::class);
// relate
Route::resource('relate', relateController::class);


});

