<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\ProfileController;
// use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


// =========================
//  USERS ROUTES
// =========================
// Route::middleware('guest')->group(function () {
//     Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
//     Route::post('/login', [AuthController::class, 'login']);
//     Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
//     Route::post('/register', [AuthController::class, 'register']);
// });
// // =========================
// //  LOGOUT USERS 
// // =========================
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// // =========================
// //  PROTECTED ROUTES USERS
// // =========================
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
// =========================
//  FRONTEND ROUTES
// =========================
Route::get('/', function () {
    return Inertia::render('Frontend/Home');
})->name('home');

Route::get('/paket-tour', function () {
    return Inertia::render('Frontend/PaketTour');
})->name('paket-tour');

Route::get('/activity', function () {
    return Inertia::render('Frontend/PaketActivity');
})->name('activity');

Route::get('/rental', function () {
    return Inertia::render('Frontend/PaketRental');
})->name('rental');

//----------------------------------------------------------------------------

// =========================
//  ADMIN AUTH
// =========================
Route::middleware('guest:admin')->prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login']);
});

// =========================
//  LOGOUT ADMIN 
// =========================
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout')->middleware('auth:admin');

// =========================
//  ADMIN DASHBOARD (Protected)
// =========================
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', fn() => Inertia::render('Backend_Admin/Dashboard'))->name('admin.dashboard');
    Route::get('/paket-tours', fn() => Inertia::render('Backend_Admin/PaketTour'))->name('admin.paket.tour');
    Route::get('/paket-activities', fn() => Inertia::render('Backend_Admin/PaketActivity'))->name('admin.paket.activity');
    Route::get('/paket-rentals', fn() => Inertia::render('Backend_Admin/PaketRental'))->name('admin.paket.rental');
    Route::get('/bookings', fn() => Inertia::render('Backend_Admin/BookingList'))->name('admin.bookings');
});  
Route::middleware(['auth:admin', 'admin'])->prefix('admin')->group(function () { // Ganti 'admin' middleware jika custom
    Route::get('/dashboard', fn() => Inertia::render('Backend_Admin/Dashboard'))->name('admin.dashboard');
    Route::get('/profile', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/profile', [AdminProfileController::class, 'destroy'])->name('admin.profile.destroy');
    Route::get('/paket-tours', fn() => Inertia::render('Backend_Admin/PaketTour'))->name('admin.paket.tour');
    Route::get('/paket-activities', fn() => Inertia::render('Backend_Admin/PaketActivity'))->name('admin.paket.activity');
    Route::get('/paket-rentals', fn() => Inertia::render('Backend_Admin/PaketRental'))->name('admin.paket.rental');
    Route::get('/bookings', fn() => Inertia::render('Backend_Admin/BookingList'))->name('admin.bookings');
});