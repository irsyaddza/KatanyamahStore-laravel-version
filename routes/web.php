<?php

use App\Models\Faq;
use App\Models\Skin;
use App\Models\Team;
use App\Models\User;
use App\Models\About;
use App\Models\Contact;
use App\Models\Pricing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminFaqController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminTeamController;
use App\Http\Controllers\AdminAboutController;
use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\AdminPricingController;
use App\Http\Controllers\AdminShowroomController;
use App\Http\Controllers\AdminManageuserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

// Public routes
Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about', ['about' => About::all()], ['team' => Team::all()]);
});

Route::get('/pricing', function () {
    return view('pricing', ['faq' => Faq::all()], ['pricing' => Pricing::all()]);
});

Route::get('/showroom', function () {
    return view('showroom', ['skin' => Skin::SimplePaginate(4)]);
});

Route::get('/contact', function () {
    return view('contact', ['contact' => Contact::all()]);
});

// Authentication routes
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Email Verification Routes
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/index');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Route untuk user biasa (fixed middleware syntax)
Route::middleware(['auth', 'verified'])->get('/index', function () {
    // Cek apakah user adalah admin
    if (Auth::user()->is_admin == 1) {
        // Redirect ke dashboard admin
        return redirect()->route('dashboard.admin');
    }

    // Jika bukan admin, tampilkan dashboard user
    return view('dashboard.index');
})->name('dashboard.user');

// Route untuk admin (add verified middleware to admin routes as well)
Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    // Tambahkan pengecekan tambahan untuk keamanan
    if (Auth::user()->is_admin != 1) {
        return redirect()->route('dashboard.user')
            ->with('error', 'You do not have permission to access admin dashboard');
    }

    // Logic khusus untuk admin dashboard
    $stats = [
        'totalUsers' => User::count(),
        // Tambahkan stats lain yang dibutuhkan
    ];

    return view('dashboard.admin', compact('stats'));
})->name('dashboard.admin');

// Admin resource routes (added verified middleware)
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::resource('/dashboard/admin/pricing', AdminPricingController::class);
    Route::resource('/dashboard/admin/showroom', AdminShowroomController::class);
    Route::resource('/dashboard/admin/faq', AdminFaqController::class);
    Route::resource('/dashboard/admin/contact', AdminContactController::class);
    Route::resource('/dashboard/admin/about', AdminAboutController::class);
    Route::resource('/dashboard/admin/team', AdminTeamController::class);
    Route::resource('/dashboard/admin/manageuser', AdminManageuserController::class);
});