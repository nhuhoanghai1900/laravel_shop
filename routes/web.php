<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/shop/{slug}', [ProductController::class, 'getByCategory']);
Route::get('/', [CategoryController::class, 'index']);
