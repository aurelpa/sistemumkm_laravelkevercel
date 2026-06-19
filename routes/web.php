<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('umkm', UmkmController::class);

Route::get('/debug-table', function () {
    return Illuminate\Support\Facades\Schema::getColumnListing('umkm');
});

Route::get('/clear-cache', function() {
    Artisan::call('view:clear');
    return 'View cache cleared';
});