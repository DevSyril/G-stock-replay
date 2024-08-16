<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('login');


Route::middleware('auth')->group(function () {
    
    Route::get('/list-user', [UserController::class, 'index'])->name('userList');
    
    Route::get('/user-create', [ViewController::class, 'createUser'])->name('createUser');
    
    Route::get('/user-dashboard', [ViewController::class, 'userDashboard'])->name('userDashboard');

});
Route::get('/logout', [ViewController::class, 'logout'])->name('logout');

Route::get('/login', [ViewController::class, 'authentication'])->name('login');

Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');

Route::post('/create-user', [UserController::class, 'create'])->name('userCreate');

Route::resource('/users', UserController::class);
