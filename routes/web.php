<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Admin\AuthController;
use App\Livewire\PendftaranSeminar;

Route::get('/', function () {
    return view('welcome');
});

// ADMIN ROUTES
Route::get('admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AuthController::class, 'login']);
Route::post('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    Route::get('admin/seminars', function () {
        return view('admin.seminars.index');
    })->name('admin.seminars.index');
    
    Route::get('admin/users', function () {
        return view('admin.users.index');
    })->name('admin.users.index');
});

// USER ROLE


// GOOGLE AUTHENTICATION
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/seminar/register/{seminarId}', PendftaranSeminar::class)->name('seminar.register');
