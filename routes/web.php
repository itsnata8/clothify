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


Route::view('/', 'home');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginAction')->name('login.action');
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'registerAction')->name('register.action');
    Route::get('/forgot-password', 'forgotPassword')->name('forgot-password');
    Route::post('/forgot-password', 'forgotPasswordAction')->name('forgot-password.action');
    Route::get('/reset-password', 'resetPassword')->name('reset-password');
    Route::post('/reset-password', 'resetPasswordAction')->name('reset-password.action');
});

// admin
Route::view('/dashboard', 'admin.dashboard');
Route::view('/profile', 'admin.profile');
Route::view('/products', 'admin.products');

// test route
Route::view('/example-auth', 'example-auth');
Route::view('/example-page', 'example-page');
Route::view('/example-home', 'example-home');
