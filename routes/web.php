<?php

use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\Sertifikasi\CertificateController;
use App\Http\Controllers\Sertifikasi\CertificateController as CertController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Admin\SeminarRegistrationController;
use App\Http\Controllers\Admin\SeminarController;
use App\Http\Controllers\SeminarController as PublicSeminarController;
use App\Http\Controllers\Admin\TrainerController;
use App\Http\Controllers\Admin\UlasanController;
use App\Http\Controllers\Asesi\TransactionController as AsesiTransactionController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\PublicUlasanController;  // TAMBAH INI
use App\Livewire\DetailCard;
use App\Livewire\PendaftaranSeminar;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;


use Midtrans\Transaction;

// =======================
// Public & User Routes
// =======================
Route::middleware(['preventAdminAccess'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

    // TAMBAH ROUTE ULASAN PUBLIK DI SINI
    Route::get('/ulasan', [PublicUlasanController::class, 'index'])->name('public.ulasan');

    // Route::get('/seminar.show/inputdatadiri', [SeminarController::class, 'inputdatadiri'])->name('detailseminar.inputdatadiri');
});

Route::get('/seminar/register/{hashid}', PendaftaranSeminar::class)->name('seminar.register');

Route::get('/seminar/{hashid}', [PublicSeminarController::class, 'show'])->name('seminar.show');

Route::get('/trainer/{hashid}', [App\Http\Controllers\TrainerController::class, 'show'])->name('trainer.show');

// =======================
// Google OAuth
// =======================
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// =======================
// General Logout
// =======================
Route::post('/logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout')->middleware('auth');

// =======================
// Web Dev Team Page
// =======================
Route::get('/web-dev-team', function () {
    return view('webdevteam');
})->name('webdev.team');

// =======================
// Admin Routes
// =======================
Route::prefix('admin')->name('admin.')->group(function () {
    // Auth Routes - NO guest middleware, LoginController handles it
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('dashboard', fn() => view('admin.dashboard'))->name('dashboard');

        // Trainer CRUD
        Route::prefix('trainers')->name('trainers.')->group(function () {
            Route::get('/', [TrainerController::class, 'index'])->name('index');
            Route::get('create', [TrainerController::class, 'create'])->name('create');
            Route::post('/', [TrainerController::class, 'store'])->name('store');
            Route::get('{trainer_hashid}', [TrainerController::class, 'show'])->name('show');
            Route::get('{trainer_hashid}/edit', [TrainerController::class, 'edit'])->name('edit');
            Route::put('{trainer_hashid}', [TrainerController::class, 'update'])->name('update');
            Route::delete('{trainer_hashid}', [TrainerController::class, 'destroy'])->name('destroy');
        });

        // Seminar CRUD
        Route::prefix('seminars')->name('seminars.')->group(function () {
            Route::get('/', [SeminarController::class, 'index'])->name('index');
            Route::get('create', [SeminarController::class, 'create'])->name('create');
            Route::post('/', [SeminarController::class, 'store'])->name('store');
            Route::get('{seminar_hashid}', [SeminarController::class, 'show'])->name('show');
            Route::get('{seminar_hashid}/edit', [SeminarController::class, 'edit'])->name('edit');
            Route::put('{seminar_hashid}', [SeminarController::class, 'update'])->name('update');
            Route::delete('{seminar_hashid}', [SeminarController::class, 'destroy'])->name('destroy');
        });

        // Seminar Registration CRUD
        Route::prefix('seminar_registration')->name('seminar_registration.')->group(function () {
            Route::get('/', [SeminarRegistrationController::class, 'index'])->name('index');
            Route::get('create', [SeminarRegistrationController::class, 'create'])->name('create');
            Route::post('/', [SeminarRegistrationController::class, 'store'])->name('store');
            Route::get('{user_hashid}', [SeminarRegistrationController::class, 'show'])->name('show');
            Route::get('{user_hashid}/edit', [SeminarRegistrationController::class, 'edit'])->name('edit');
            Route::put('{user_hashid}', [SeminarRegistrationController::class, 'update'])->name('update');
            Route::delete('{user_hashid}', [SeminarRegistrationController::class, 'destroy'])->name('destroy');
        });

        Route::get('messages', fn() => view('admin.messages.index'))->name('messages.index');

        // Attendance Routes
        Route::prefix('attendance')->name('attendance.')->group(function () {
            Route::get('/', [SeminarController::class, 'activeSeminars'])->name('index');
            Route::get('seminar/{seminar_hashid}/registrants', [SeminarController::class, 'registrants'])->name('seminar.registrants');
            Route::post('seminar/{seminar_hashid}/start-presentation', [SeminarController::class, 'startPresentation'])->name('seminar.start-presentation');
        });

        // Ulasan Management
        Route::prefix('ulasan')->name('ulasan.')->group(function () {
            Route::get('/', [UlasanController::class, 'index'])->name('index');
            Route::patch('{id}/approve', [UlasanController::class, 'approve'])->name('approve');
            Route::patch('{id}/reject', [UlasanController::class, 'reject'])->name('reject');
        });
    });
});

// =======================
// Absent Routes
// =======================
Route::get('absent/Test', fn() => view('absen.index'))->name('absent.test');
// Tambahkan route ini di luar middleware admin
Route::get('attend/{seminar_hashid}/{token}', [AttendanceController::class, 'showAttendanceForm'])
    ->name('attend.form');
Route::post('attend/{seminar_hashid}/{token}', [AttendanceController::class, 'markAttendance'])
    ->name('attend.mark');

// =======================
// Certificate
// =======================
Route::get('/certificates', [CertificateController::class, 'index'])->name('certificates.index');

// Opsional (buat test manual via URL): issue sertif dari 1 attendance id
Route::post('/certificates/issue-from-attendance/{attendance_hashid}', [CertificateController::class, 'issueFromAttendance'])
    ->name('certificates.issue-from-attendance');

// =======================
// Payment Routes
// =======================
Route::prefix('payments')->name('payments.')->group(function () {
    Route::get('/', [PaymentController::class, 'index'])->name('index');
    Route::get('/payments/finish/{order_id}', [PaymentController::class, 'finish'])->name('finish');
    Route::get('pending', [PaymentController::class, 'pending'])->name('pending');
    Route::get('error', [PaymentController::class, 'error'])->name('error');
    Route::get('{hashid}/create', [PaymentController::class, 'create'])->name('create');
    Route::post('/', [PaymentController::class, 'store'])->name('store');
    Route::get('{hashid}/checkout', [PaymentController::class, 'checkout'])->name('checkout');
    Route::get('{hashid}', [PaymentController::class, 'detail'])->name('detail');
    Route::get('/transaksi', [TransactionController::class, 'index'])->name('transaksi');

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
    Route::get('/attendance/{attendance_hashid}/preview', [CertController::class, 'attendancePreview'])
        ->name('attendance.preview.html');

    Route::get('/attendance/{attendance_hashid}/preview-pdf', [CertController::class, 'attendancePreviewPdf'])
        ->name('attendance.preview.pdf');

    // Download by certificate id (opsional)
    Route::get('/{hashid}/download', [CertController::class, 'download'])
        ->name('download');
});

// ROUTE PROVIDE DATA PROVINSI DAN LAINNYA
Route::get('/regencies/{provinceName}', [RegionController::class, 'getRegencies']);
Route::get('/districts/{regencyName}', [RegionController::class, 'getDistricts']);
Route::get('/villages/{districtName}', [RegionController::class, 'getVillages']);
