<?php

use App\Http\Controllers\SuperAdmin\RevenueController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'revenue', 'as' => 'revenue.', 'middleware' => ['SuperAdminMiddleware']], function () {
    Route::get('', [RevenueController::class, 'index'])->name('index');
    Route::get('/settings', [RevenueController::class, 'settings'])->name('settings');
    Route::post('/settings', [RevenueController::class, 'updateSettings'])->name('settings');
});