<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OrderAdminController;

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->group(function () {
        Route::get('/orders', [OrderAdminController::class, 'index'])->name('admin.orders.index');
        Route::get('/orders/details/{userId}', [OrderAdminController::class, 'show'])->name('admin.orders.show');
    });
