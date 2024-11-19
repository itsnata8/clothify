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
Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.register')->name('register');
Route::view('/forgot-password', 'auth.forgot-password');
Route::view('/reset-password', 'auth.reset-password');

// admin
Route::view('/dashboard', 'admin.dashboard');
Route::view('/profile', 'admin.profile');
Route::view('/products', 'admin.products');

// test route
Route::view('/example-auth', 'example-auth');
Route::view('/example-page', 'example-page');
Route::view('/example-home', 'example-home');
