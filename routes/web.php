<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::view('/', 'home')->name('home');

Route::controller(AuthController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'loginAction')->name('login.action');
        Route::get('/register', 'register')->name('register');
        Route::post('/register', 'registerAction')->name('register.action');
        Route::get('/forgot-password', 'forgotPassword')->name('forgot-password');
        Route::post('/forgot-password', 'forgotPasswordAction')->name('forgot-password.action');
        Route::get('/reset-password/{token}', 'resetPassword')->name('password.reset');
        Route::post('/reset-password', 'resetPasswordAction')->name('password-reset.action');
    });
    Route::middleware('auth')->group(function () {
        Route::get('/email/verify', 'getEmailVerify')->name('verification.notice');
        Route::get('/email/verify/{id}/{hash}', 'verifyEmail')->middleware('signed')->name('verification.verify');
        Route::post('/email/verification-notification', 'sendVerificationEmail')->middleware('throttle:6,1')->name('verification.send');
    });
});

// admin
Route::view('/dashboard', 'admin.dashboard');
Route::view('/profile', 'admin.profile');
Route::view('/products', 'admin.products');
Route::view('/reset-password-layout', 'auth.reset-password');
Route::view('/email-verify-layout', 'auth.email-verify');

// test route
Route::view('/example-auth', 'example-auth');
Route::view('/example-page', 'example-page');
Route::view('/example-home', 'example-home');
