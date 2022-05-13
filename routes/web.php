<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\MessageController;

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


Auth::routes();
Route::get('/test', function () {
    return view('layouts.master');
});


Route::view('/search-res', 'search-res')->name('search-res');
// Route::view('/chat-rooms', 'chat-rooms')->name('chat-rooms');
Route::view('/home', 'home')->name('home');
Route::view('/login', 'login')->name('login');
Route::view('/register', 'register')->name('register');
// Route::view('/chat/{$chat_name}', 'chat')->name('chat');

//=========================USER CONTROLLER====================================================
Route::get('/user-info/{id}', [UserController::class, 'showProfile'])->name('showProfile');
Route::post('/create', [UserController::class, 'create'])->name('create');
Route::post('/check', [UserController::class, 'check'])->name('check');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/search', [UserController::class, 'search'])->name('search');
//============================================================================================

//====================MESSAGE CONTROLLER======================================================
Route::get('/chat-rooms', [MessageController::class, 'showChatRooms'])->name('showChatRooms');
Route::get('/chat/{id}', [MessageController::class, 'showChat'])->name('showChat');
//-------------?
Route::get('/deleteMessage/{id}', [MessageController::class, 'deleteMessage'])->name('deleteMessage');
//-------------?
Route::post('/create-chat', [MessageController::class, 'createChatRoom'])->name('create-chat');
Route::post('/send-message', [MessageController::class, 'createMessage'])->name('send-message');
//============================================================================================

//====================FRIENDS CONTROLLER======================================================
Route::get('/requests', [FriendsController::class, 'showRequests'])->name('showRequests');
Route::get('/delete/{id}', [FriendsController::class, 'delete'])->name('delete');
Route::get('/delete-friend/{id}', [FriendsController::class, 'deleteFriend'])->name('deleteFriend');
Route::get('/friends', [FriendsController::class, 'showFriends'])->name('showFriends');
Route::put('/comfirm/{id}', [FriendsController::class, 'comfirm'])->name('comfirm');
Route::post('/add-friend', [FriendsController::class, 'sendRequest'])->name('add-friend');
//============================================================================================
