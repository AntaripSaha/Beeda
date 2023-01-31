<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopSettingController;

Route::group(['prefix' => 'cuisine', 'as' => 'cuisine.', 'middleware' => ['StoreRegisterMiddleware']], function () {
    Route::get('{id}', [ShopSettingController::class, 'cuisines'])->name('list');
    Route::post('/store', [ShopSettingController::class, 'storeCuisine'])->name('store');
    Route::post('/delete', [ShopSettingController::class, 'deleteCuisine'])->name('delete');
});

Route::group(['prefix' => 'addon', 'as' => 'addon.', 'middleware' => ['StoreRegisterMiddleware']], function () {
    Route::get('{id}', [ShopSettingController::class, 'addons'])->name('list');
    Route::post('/store', [ShopSettingController::class, 'storeAddon'])->name('store');
    Route::post('/delete', [ShopSettingController::class, 'deleteAddon'])->name('delete');
});