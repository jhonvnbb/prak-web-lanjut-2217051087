<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/profile', [ProfileController::class, 'profile']);

Route::get('/user/create', [UserController::class, 'create'])->name('user.create');

Route::post('/user/store', [UserController::class, 'store'])->name('user.store'); 

Route::get('/user', [UserController::class, 'index']);

Route::get('/show/{id}', [UserController::class, 'show'])-> name('user.show');

?>