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

use App\Http\Controllers\Admin\SeminarController;
use App\Http\Controllers\Admin\UserController;

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    Route::get('admin/seminars', [SeminarController::class, 'index'])->name('admin.seminars.index');
    Route::get('admin/seminars/create', [SeminarController::class, 'create'])->name('admin.seminars.create');
    Route::post('admin/seminars', [SeminarController::class, 'store'])->name('admin.seminars.store');
    Route::get('admin/seminars/{seminar}', [SeminarController::class, 'show'])->name('admin.seminars.show');
    Route::get('admin/seminars/{seminar}/edit', [SeminarController::class, 'edit'])->name('admin.seminars.edit');
    Route::put('admin/seminars/{seminar}', [SeminarController::class, 'update'])->name('admin.seminars.update');
    Route::delete('admin/seminars/{seminar}', [SeminarController::class, 'destroy'])->name('admin.seminars.destroy');
    
Route::get('admin/users', [UserController::class, 'index'])->name('admin.users.index');
Route::get('admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
Route::post('admin/users', [UserController::class, 'store'])->name('admin.users.store');
Route::get('admin/users/{user}', [UserController::class, 'show'])->name('admin.users.show');
Route::get('admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
Route::put('admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
Route::delete('admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
// Route::resource('admin/users', UserController::class);
});

// USER ROLE


// GOOGLE AUTHENTICATION
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/seminar/register/{seminarId}', PendftaranSeminar::class)->name('seminar.register');
