<?php

use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Sertifikasi\CertificateController;
use App\Http\Controllers\Sertifikasi\CertificateController as CertController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Admin\SeminarRegistrationController;
use App\Http\Controllers\Admin\SeminarController;
use App\Http\Controllers\Admin\TrainerController;
use App\Http\Controllers\Auth\GoogleController;
use App\Livewire\PendaftaranSeminar;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;



// =======================
// Public & User Routes
// =======================
Route::middleware(['preventAdminAccess'])->group(function () {
    Route::get('/', fn() => view('welcome'))->name('welcome');


    Route::get('/seminar/register/{hashid}', PendaftaranSeminar::class)->name('seminar.register');
    // =======================
    // Admin Authentication
    // =======================
    Route::get('admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('admin/login', [AuthController::class, 'login']);
});
Route::post('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// =======================
// Google OAuth
// =======================
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// =======================
// General Logout
// =======================
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// =======================
// Admin Routes
// =======================
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', fn() => view('admin.dashboard'))->name('dashboard');

    Route::resource('trainers', TrainerController::class)->names('trainers');

    // Seminar CRUD
    Route::prefix('seminars')->name('seminars.')->group(function () {
        Route::get('/', [SeminarController::class, 'index'])->name('index');
        Route::get('create', [SeminarController::class, 'create'])->name('create');
        Route::post('/', [SeminarController::class, 'store'])->name('store');
        Route::get('{seminar}', [SeminarController::class, 'show'])->name('show');
        Route::get('{seminar}/edit', [SeminarController::class, 'edit'])->name('edit');
        Route::put('{seminar}', [SeminarController::class, 'update'])->name('update');
        Route::delete('{seminar}', [SeminarController::class, 'destroy'])->name('destroy');
    });

    // Seminar Registration CRUD
    Route::prefix('seminar_registration')->name('seminar_registration.')->group(function () {
        Route::get('/', [SeminarRegistrationController::class, 'index'])->name('index');
        Route::get('create', [SeminarRegistrationController::class, 'create'])->name('create');
        Route::post('/', [SeminarRegistrationController::class, 'store'])->name('store');
        Route::get('{user}', [SeminarRegistrationController::class, 'show'])->name('show');
        Route::get('{user}/edit', [SeminarRegistrationController::class, 'edit'])->name('edit');
        Route::put('{user}', [SeminarRegistrationController::class, 'update'])->name('update');
        Route::delete('{user}', [SeminarRegistrationController::class, 'destroy'])->name('destroy');
    });

    Route::get('messages', fn() => view('admin.messages.index'))->name('messages.index');

    // Attendance Routes
    Route::prefix('attendance')->name('attendance.')->group(function () {
        Route::get('/', [SeminarController::class, 'activeSeminars'])->name('index');
        Route::get('seminar/{seminar}/registrants', [SeminarController::class, 'registrants'])->name('seminar.registrants');
        Route::post('seminar/{seminar}/start-presentation', [SeminarController::class, 'startPresentation'])->name('seminar.start-presentation');
    });
});



// =======================
// Absent Routes
// =======================
Route::get('absent/Test', fn() => view('absen.index'))->name('absent.test');


// Tambahkan route ini di luar middleware admin
Route::get('attend/{seminar}/{token}', [AttendanceController::class, 'showAttendanceForm'])
    ->name('attend.form');
Route::post('attend/{seminar}/{token}', [AttendanceController::class, 'markAttendance'])
    ->name('attend.mark');

// =======================
// Certificate 
// =======================
Route::get('/certificates', [CertificateController::class, 'index'])->name('certificates.index');

// Opsional (buat test manual via URL): issue sertif dari 1 attendance id
Route::post('/certificates/issue-from-attendance/{attendance}', [CertificateController::class, 'issueFromAttendance'])
    ->name('certificates.issue-from-attendance');

// =======================
// Payment Routes
// =======================
Route::prefix('payments')->name('payments.')->group(function () {
    Route::get('/', [PaymentController::class, 'index'])->name('index');
    Route::get('finish/{id}', [PaymentController::class, 'finish'])->name('finish');
    Route::get('pending', [PaymentController::class, 'pending'])->name('pending');
    Route::get('error', [PaymentController::class, 'error'])->name('error'); // fixed typo
    Route::get('{id}/create', [PaymentController::class, 'create'])->name('create');
    Route::post('/', [PaymentController::class, 'store'])->name('store');
    Route::get('{id}/checkout', [PaymentController::class, 'checkout'])->name('checkout');
    Route::get('{id}', [PaymentController::class, 'detail'])->name('detail');
});


Route::prefix('certificates')->name('certificates.')->group(function () {
    // Halaman index preview
    Route::get('/', [CertController::class, 'index'])->name('index');

    // Demo preview HTML (opsional)
    Route::get('/demo/preview', [CertController::class, 'demoPreview'])
        ->name('demo.preview.html');

    // Demo preview PDF (INI YANG DIPAKAI DI BLADE)
    Route::get('/demo/preview-pdf', [CertController::class, 'demoPreviewPdf'])
        ->name('demo.preview.pdf');

    // Preview by attendance (opsional)
    Route::get('/attendance/{attendance}/preview', [CertController::class, 'attendancePreview'])
        ->name('attendance.preview.html');

    Route::get('/attendance/{attendance}/preview-pdf', [CertController::class, 'attendancePreviewPdf'])
        ->name('attendance.preview.pdf');

    // Download by certificate id (opsional)
    Route::get('/{id}/download', [CertController::class, 'download'])
        ->name('download');
});