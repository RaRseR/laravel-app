<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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

Route::get('/', [OrderController::class, 'main'])->name('main');

Route::middleware(['guest'])->group(function () {
    Route::post('/signUp', [UserController::class, 'signUp']);
    Route::post('/signIn', [UserController::class, 'signIn']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/signOut', [UserController::class, 'signOut'])->name("signOut");
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/addOrder', [UserController::class, 'addOrder'])->name('addOrder');
});



Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'main'])->name('admin');
    Route::post('/addCategory', [AdminController::class, 'addCategory'])->name('addCategory');
    Route::post('/deleteCategory', [AdminController::class, 'deleteCategory'])->name('deleteCategory');
    Route::post('/changeStatus', [AdminController::class, 'changeStatus'])->name('changeStatus');
});
