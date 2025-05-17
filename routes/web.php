<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

Route::post('/order', [OrderController::class, 'order'])->name('cart.order')->middleware('throttle:5,1');

Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::post('/cart/add', [CartController::class, 'addCart'])->name('cart.add');
Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');

Route::get('/shop/{categoryslug}/{productSlug}', [ProductController::class, 'showProduct']);
Route::get('/shop/{slug}', [ProductController::class, 'getByCategory']);

Route::get('/', fn() => view('home'));
