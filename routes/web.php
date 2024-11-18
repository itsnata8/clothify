<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::view('/', 'home');
Route::view('/login', 'admin.login');
Route::view('/register', 'admin.register');
Route::view('/forgot-password', 'admin.forgot-password');
Route::view('/reset-password', 'admin.reset-password');
Route::view('/verify-email', 'admin.verify-email');
Route::view('/email-verified', 'admin.email-verified');

Route::view('/dashboard', 'admin.dashboard');
Route::view('/profile', 'admin.profile');
Route::view('/products', 'admin.products');
