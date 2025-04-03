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
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardAdminController;

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
    return view('showroom', ['skin' => Skin::SimplePaginate(6)]);
});

Route::get('/contact', function () {
    return view('contact', ['contact' => Contact::all()]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Route untuk user biasa
Route::middleware(['auth'])->get('/index', function () {
    // Cek apakah user adalah admin
    if (Auth::user()->is_admin == 1) {
        // Redirect ke dashboard admin
        return redirect()->route('dashboard.admin');
    }

    // Jika bukan admin, tampilkan dashboard user
    return view('dashboard.index');
})->name('dashboard.user');

// Route untuk admin
Route::middleware(['auth'])->get('/dashboard', function () {
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

Route::resource('/dashboard/admin', DashboardAdminController::class)->middleware('auth');
