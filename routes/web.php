<?php

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

Route::get('/', function () {
    return view('main');
})->name('main');

Route::middleware(['guest'])->group(function () {
    Route::post('/signUp', [UserController::class, 'signUp']);
    Route::post('/signIn', [UserController::class, 'signIn']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/signOut', [UserController::class, 'signOut'])->name("signOut");
    Route::get('/profile',[UserController::class, 'profile'])->name('profile');
    Route::post('/addOrder',[UserController::class, 'addOrder'])->name('addOrder');
});
