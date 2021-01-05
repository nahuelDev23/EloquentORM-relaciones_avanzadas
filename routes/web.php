<?php

use App\Http\Controllers\LevelController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $users = App\Models\User::get();
    return view('welcome',compact('users'));
});

Route::resource('profile',ProfileController::class);
Route::resource('level',LevelController::class);
Route::resource('post',PostController::class);