<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

Route::post('/order', [OrderController::class, 'order'])->name('cart.order')->middleware('auth', 'throttle:5,1');

Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::post('/cart/add', [CartController::class, 'addCart'])->name('cart.add');
Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');

Route::get('/shop/details/{product:slug}', [ProductController::class, 'productDetails'])->name('shop.details');
Route::get('/shop/{category:slug}', [ProductController::class, 'showProducts'])->name('shop.show');

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.login');
Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.register');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout')->middleware('auth', 'throttle:5,1');

Route::get('/', fn() => view('home'))->name('home');

require base_path('routes/admin.php');
