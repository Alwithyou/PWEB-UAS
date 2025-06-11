<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Models\AlatCamping;
use App\Http\Controllers\AlatCampingController;

// Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard USER
Route::get('/user/dashboard', function () {
    $alat = AlatCamping::where('status', 'available')->get();
    $hasAlat = AlatCamping::where('pengguna_id', auth()->id())->exists();
    return view('user.dashboardUser', compact('alat', 'hasAlat'));
})->middleware(['auth', 'verified'])->name('user.dashboard');

// Kelola Alat
Route::get('/user/kelola-alat', function () {
    $alatSaya = AlatCamping::where('pengguna_id', auth()->id())->get();
    return view('user.barang.kelolaAlat', compact('alatSaya'));;
})->middleware(['auth', 'verified'])->name('user.kelola');

Route::get('/user/barang/tambah', function () {
    return view('user.barang.tambahAlat');
})->middleware(['auth', 'verified'])->name('user.alat.tambah');

use App\Http\Controllers\UserAlatController;

Route::post('/user/barang/simpan', [AlatCampingController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('user.alat.simpan');

// Verifikasi Email
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('user.dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Link verifikasi telah dikirim!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
