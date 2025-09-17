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
use App\Http\Controllers\Admin\SeminarRegistrationController;

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
    
Route::get('admin/seminar_registration', [SeminarRegistrationController::class, 'index'])->name('admin.seminar_registration.index');
Route::get('admin/seminar_registration/create', [SeminarRegistrationController::class, 'create'])->name('admin.seminar_registration.create');
Route::post('admin/seminar_registration', [SeminarRegistrationController::class, 'store'])->name('admin.seminar_registration.store');
Route::get('admin/seminar_registration/{user}', [SeminarRegistrationController::class, 'show'])->name('admin.seminar_registration.show');
Route::get('admin/seminar_registration/{user}/edit', [SeminarRegistrationController::class, 'edit'])->name('admin.seminar_registration.edit');
Route::put('admin/seminar_registration/{user}', [SeminarRegistrationController::class, 'update'])->name('admin.seminar_registration.update');
Route::delete('admin/seminar_registration/{user}', [SeminarRegistrationController::class, 'destroy'])->name('admin.seminar_registration.destroy');
// Route::resource('admin/seminar_registration', SeminarRegistrationController::class);
});

// USER ROLE


// GOOGLE AUTHENTICATION
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/seminar/register/{seminarId}', PendftaranSeminar::class)->name('seminar.register');
