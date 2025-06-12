<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AlatCampingController;
use App\Http\Controllers\PemesananController;
use App\Models\AlatCamping;
use App\Http\Controllers\UserController;


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/email/verify', fn() => view('auth.verify-email'))->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect()->route('user.dashboard');
    })->middleware('signed')->name('verification.verify');
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Link verifikasi telah dikirim!');
    })->middleware('throttle:6,1')->name('verification.send');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/user/dashboard', [AlatCampingController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/user/profil', [UserController::class, 'profil'])->name('user.profil');
    Route::get('/user/profil/edit', [UserController::class, 'editProfil'])->name('user.profil.edit');
    Route::put('/user/profil/update', [UserController::class, 'updateProfil'])->name('user.profil.update');
});

Route::middleware(['auth', 'verified'])->prefix('user')->group(function () {
    Route::get('/kelola-alat', [AlatCampingController::class, 'index'])->name('user.kelola');
    Route::get('/barang/tambah', fn() => view('user.barang.tambahAlat'))->name('user.alat.tambah');
    Route::post('/barang/simpan', [AlatCampingController::class, 'store'])->name('user.alat.simpan');
    Route::get('/barang/{id}/edit', [AlatCampingController::class, 'edit'])->name('user.alat.edit');
    Route::put('/barang/{id}/update', [AlatCampingController::class, 'update'])->name('user.alat.update');
    Route::delete('/barang/{id}', [AlatCampingController::class, 'destroy'])->name('user.alat.destroy');
});

Route::get('/alat/{id}', [PemesananController::class, 'show'])->name('alat.detail');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/alat/{id}/sewa', [PemesananController::class, 'formSewa'])->name('alat.formSewa');
    Route::post('/alat/{id}/sewa', [PemesananController::class, 'prosesSewa'])->name('alat.prosesSewa');
});

Route::middleware(['auth', 'verified'])->prefix('user/pesanan')->group(function () {
    Route::get('/kelola', [PemesananController::class, 'kelolaPesanan'])->name('user.pesanan.kelola');
    Route::get('/{id}', [PemesananController::class, 'detailPesanan'])->name('user.pesanan.detail');
    Route::post('/{id}/approve', [PemesananController::class, 'setujuiPesanan'])->name('user.pesanan.approve');
    Route::post('/{id}/reject', [PemesananController::class, 'tolakPesanan'])->name('user.pesanan.reject');
});
