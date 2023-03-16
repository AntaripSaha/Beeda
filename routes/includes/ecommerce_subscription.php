<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\EcommerceSubscriptionController;
use App\Http\Controllers\SuperAdmin\EcommerceSubscriptionOptionController;

Route::group(['as' => 'option.', 'middleware' => ['SuperAdminMiddleware']], function () {
    Route::get('/options', [EcommerceSubscriptionOptionController::class, 'index'])->name('index');
    Route::get('/option-add', [EcommerceSubscriptionOptionController::class, 'create'])->name('add');
    Route::post('/option-store', [EcommerceSubscriptionOptionController::class, 'store'])->name('store');
    Route::get('/option/{id}/edit', [EcommerceSubscriptionOptionController::class, 'editOption'])->name('edit');
    Route::post('/option-update', [EcommerceSubscriptionOptionController::class, 'updateOption'])->name('update');
    Route::post('/option-delete/{id}', [EcommerceSubscriptionOptionController::class, 'deleteOption'])->name('delete');
});

Route::group(['prefix' => 'ecommerce-subscriptions', 'as' => 'ecommerce_subscription.', 'middleware' => ['SuperAdminMiddleware']], function () {
    Route::get('/', [EcommerceSubscriptionController::class, 'index'])->name('index');
    Route::get('add', [EcommerceSubscriptionController::class, 'add'])->name('add');
    Route::post('store', [EcommerceSubscriptionController::class, 'store'])->name('store');
    Route::get('edit/{id}', [EcommerceSubscriptionController::class, 'edit'])->name('edit');
    Route::post('update', [EcommerceSubscriptionController::class, 'update'])->name('update');
    Route::post('delete', [EcommerceSubscriptionController::class, 'destory'])->name('delete');

    Route::post('publish', [EcommerceSubscriptionController::class, 'publish'])->name('publish');

    Route::get('seller', [EcommerceSubscriptionController::class, 'seller'])->name('seller');
    Route::get('/seller-details/{user_id}', [EcommerceSubscriptionController::class, 'sellerSubscriptionDetails'])->name('seller.details');
});