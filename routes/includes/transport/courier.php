<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\PackageTypeController;
use App\Http\Controllers\SuperAdmin\PackageAttributeController;

Route::group(['prefix' => 'transport', 'as' => 'transport.', 'middleware' => ['SuperAdminMiddleware']], function () {
    Route::group(['prefix' => 'courier', 'as' => 'courier.'], function () {
            
        Route::group(['prefix' => 'package-type', 'as' => 'package-type.'], function () {
            Route::get('/', [PackageTypeController::class, 'index'])->name('list');
            Route::get('/create', [PackageTypeController::class, 'create'])->name('create');
            Route::post('/store', [PackageTypeController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [PackageTypeController::class, 'edit'])->name('edit');
            Route::post('/update', [PackageTypeController::class, 'update'])->name('update');
            Route::get('/attributes/{id}', [PackageTypeController::class, 'assignPackageAttribute'])->name('assign.attribute');
            Route::post('/attributes/store', [PackageTypeController::class, 'storePackageAttribute'])->name('store.attribute');
            Route::get('/vehicles/{id}', [PackageTypeController::class, 'assignVehicle'])->name('assign.vehicle');
            Route::post('/vehicles/store', [PackageTypeController::class, 'storePackageTypeVehicle'])->name('store.vehicle');
        });

        Route::group(['prefix' => 'package-attribute', 'as' => 'package-attribute.'], function () {
            Route::get('/', [PackageAttributeController::class, 'index'])->name('list');
            Route::get('/create', [PackageAttributeController::class, 'create'])->name('create');
            Route::post('/store', [PackageAttributeController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [PackageAttributeController::class, 'edit'])->name('edit');
            Route::post('/update', [PackageAttributeController::class, 'update'])->name('update');
            Route::get('/attribute-value/{id}', [PackageAttributeController::class, 'assignAttributeValue'])->name('assign.attribute.value');
            Route::post('/assign-value', [PackageAttributeController::class, 'assignValue'])->name('assign.value');
            Route::get('/get-attribute-values/{id}', [PackageAttributeController::class, 'getPackageAttributeValues'])->name('attribute.values');
        });
    });
});