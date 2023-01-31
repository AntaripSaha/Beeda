<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\DashboardController as SuperAdminDashboardController;

Route::group(['prefix' => 'movie', 'as' => 'movie.', 'middleware' => ['SuperAdminMiddleware']], function () {
    Route::get('/list', [SuperAdminDashboardController::class, 'list'])->name('index');
    Route::post('/update', [SuperAdminDashboardController::class, 'update'])->name('update');
    Route::get('/video/create', [SuperAdminDashboardController::class, 'createVideo'])->name('video.create');
    Route::post('/video/store', [SuperAdminDashboardController::class, 'storeVideo'])->name('video.store');
    Route::get('/video/edit/{id}', [SuperAdminDashboardController::class, 'editVideo'])->name('video.edit');
    Route::post('/video/update/{id}', [SuperAdminDashboardController::class, 'updateVideo'])->name('video.update');
    Route::post('/video/delete/{id}', [SuperAdminDashboardController::class, 'deleteVideo'])->name('video.delete');
});
