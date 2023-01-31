<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\SubscriptionController;

Route::group(['prefix' => 'subscriptions', 'as' => 'subscriptions.', 'middleware' => ['SuperAdminMiddleware']], function () {
    Route::get('/', [SubscriptionController::class, 'index'])->name('index');
    Route::get('add', [SubscriptionController::class, 'add'])->name('add');
    Route::post('store', [SubscriptionController::class, 'store'])->name('store');
    Route::get('edit/{id}', [SubscriptionController::class, 'edit'])->name('edit');
    Route::post('update', [SubscriptionController::class, 'update'])->name('update');
    Route::post('delete', [SubscriptionController::class, 'destory'])->name('delete');

    Route::post('publish', [SubscriptionController::class, 'publish'])->name('publish');

    Route::get('driver', [SubscriptionController::class, 'driver'])->name('driver');
    Route::get('/driver-details/{user_id}', [SubscriptionController::class, 'driverSubscriptionDetails'])->name('driver.details');
});
