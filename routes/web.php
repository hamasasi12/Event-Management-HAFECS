<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;

// LANDING PAGE
Route::get('/', function () {
    return view('welcome');
});

// ADMIN ROLE
Route::get('admin/login', function () {
    return view('login');
});

// USER ROLE


// GOOGLE AUTHENTICATION
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

