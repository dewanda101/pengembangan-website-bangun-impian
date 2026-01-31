<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\KontakController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Middleware\EnsureAdmin;

// Website Routes
Route::get('/', fn() => view('home'))->name('home');
Route::get('/tentang', fn() => view('tentang'))->name('tentang');
Route::get('/layanan', fn() => view('layanan'))->name('layanan');
Route::get('/portofolio', fn() => view('portofolio'))->name('portofolio');
Route::get('/kontak', fn() => view('kontak'))->name('kontak');
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');
Route::get('/kontak/terima-kasih', fn() => view('kontak-terima-kasih'))->name('kontak.terima-kasih');

// Admin Auth
Route::get('admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
Route::post('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin Routes (protected)
Route::prefix('admin')->name('admin.')->middleware([EnsureAdmin::class])->group(function () {
    Route::get('/', fn() => view('admin.dashboard'))->name('dashboard');
    Route::resource('kontak', KontakController::class);
    Route::resource('portfolio', PortfolioController::class);
    Route::resource('layanan', LayananController::class);
});
