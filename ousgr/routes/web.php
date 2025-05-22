<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
use App\Http\Controllers\DashboardController;

Route::middleware(['auth'])->group(function () {
    Route::get('/employe/dashboard', [DashboardController::class, 'employe'])->name('employe.dashboard');
    Route::get('/prestataire/dashboard', [DashboardController::class, 'prestataire'])->name('prestataire.dashboard');
    Route::get('/admin/fonctionnel/dashboard', [DashboardController::class, 'adminFonctionnel'])->name('admin.fonctionnel.dashboard');
    Route::get('/admin/dsi/dashboard', [DashboardController::class, 'adminDsi'])->name('admin.dsi.dashboard');
});
Route::middleware(['auth', 'role:employe'])->group(function () {
    Route::get('/employe/dashboard', [DashboardController::class, 'employe'])->name('employe.dashboard');
});

Route::middleware(['auth', 'role:prestataire'])->group(function () {
    Route::get('/prestataire/dashboard', [DashboardController::class, 'prestataire'])->name('prestataire.dashboard');
});

Route::middleware(['auth', 'role:admin_fonctionnel'])->group(function () {
    Route::get('/admin/fonctionnel/dashboard', [DashboardController::class, 'adminFonctionnel'])->name('admin.fonctionnel.dashboard');
});

Route::middleware(['auth', 'role:admin_dsi'])->group(function () {
    Route::get('/admin/dsi/dashboard', [DashboardController::class, 'adminDsi'])->name('admin.dsi.dashboard');
});
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
// GESTION UTILISATEURS - ADMIN DSI
Route::middleware(['auth', 'role:admin_dsi'])->group(function () {
    Route::get('/admin/utilisateurs', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
});
Route::middleware(['auth', 'role:admin_dsi'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
});

Route::middleware(['auth', 'role:admin_dsi'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('slas', \App\Http\Controllers\Admin\SlaController::class);
});

