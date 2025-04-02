<?php

use App\Models\Faq;
use App\Models\Skin;
use App\Models\Team;
use App\Models\About;
use App\Models\Contact;
use App\Models\Pricing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;


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

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index']);