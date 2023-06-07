<?php

use App\Models\Activity;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactaController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ReservationController;
use App\Mail\ContactaMail;
use Illuminate\Support\Facades\Mail;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/company', [ContactaController::class, 'company'])->name('company');

Route::get('/error', [HomeController::class, 'error'])->name('error.index');

Route::resource('/activities', ActivityController::class);

Route::resource('/reservations', ReservationController::class)->except(['store']);

Route::post('/reservations/store', [ReservationController::class, 'store'])->name('reservations.store');

Route::get('contacta',[ContactaController::class,'index'])->name('contacta.index');

Route::post('contacta',[ContactaController::class,'store'])->name('contacta.store');

//Route::get('admin',[HomeController::class,'index'])->name('admin.index');

//Route::get('admin/list_users',[HomeController::class,'list_users'])->name('admin.list_users');

Route::prefix('admin')->group(function () {

    Route::get('/',[AdminController::class,'index'])->name('admin.index');
    Route::get('/list_users',[AdminController::class,'list_users']);
    Route::get('/list_groups',[AdminController::class,'list_groups']);
    Route::get('/list_songs',[AdminController::class,'list_songs']);
    Route::get('/users/index',[UserController::class,'index'])->name('auth.admin.users.index');
    Route::get('/users/edit',[UserController::class,'edit'])->name('auth.admin.users.edit');
    Route::get('/users/update',[UserController::class,'update'])->name('auth.admin.users.update');

});
