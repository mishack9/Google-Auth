<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\UploadFileController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/auth/google', [GoogleController::class, 'redirect_to_google'])->name('auth.google');

Route::get('/auth/google/callback', [GoogleController::class, 'HanlerGoogle_callback'])->name('auth.google.callback');

