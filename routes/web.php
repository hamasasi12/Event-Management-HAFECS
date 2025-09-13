<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\GoogleController;
use App\Livewire\PendftaranSeminar;

Route::get('/', function () {
    return view('welcome');
});



// admin login 
Route::get('admin/login', function () {
    return view('login');
});
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');


Route::get('/seminar/register/{seminarId}', PendftaranSeminar::class)->name('seminar.register');


