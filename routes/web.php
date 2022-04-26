<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();
// Route::post('/update/token', 'Auth\RegisterController@updateToken')->name('updateToken');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/home', 'home')->name('home');
Route::view('/login', 'login')->name('login');
Route::view('/register', 'register')->name('register');
Route::view('/search-res', 'search-res')->name('search-res');

Route::get('/user-info/{id}', [UserController::class, 'showProfile'])->name('showProfile');
Route::get('/requests', [UserController::class, 'showRequests'])->name('showRequests');
Route::get('/friends', [UserController::class, 'showFriends'])->name('showFriends');
Route::get('/delete/{id}', [UserController::class, 'delete'])->name('delete');
Route::put('/comfirm/{id}', [UserController::class, 'comfirm'])->name('comfirm');
Route::get('/delete-friend/{id}', [UserController::class, 'deleteFriend'])->name('deleteFriend');


// Route::put('update-cart/{id}', [CartController::class, 'update']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/create', [UserController::class, 'create'])->name('create');
Route::post('/check', [UserController::class, 'check'])->name('check');
Route::post('/search', [UserController::class, 'search'])->name('search');
Route::post('/add-friend', [UserController::class, 'sendRequest'])->name('add-friend');
