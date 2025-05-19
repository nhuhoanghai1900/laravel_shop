<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OrderAdminController;

Route::middleware(['web'])->prefix('admin')->group(function () {
    Route::get('/orders', [OrderAdminController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/{id}', [OrderAdminController::class, 'show'])->name('admin.orders.show');
});

