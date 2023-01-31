<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\ServiceController;

Route::group(['prefix' => 'worker', 'as' => 'worker.', 'middleware' => ['SuperAdminMiddleware']], function () {
    Route::get('/service-list', [ServiceController::class, 'workerServiceList'])->name('service.list');
    Route::get('/add-service', [ServiceController::class, 'addWorkerService'])->name('service.add');
    Route::post('/add-service', [ServiceController::class, 'addWorkerServiceSubmit'])->name('service.add.submit');
    Route::get('/edit-service/{id}', [ServiceController::class, 'editWorkerService'])->name('service.edit');
    Route::post('/edit-service', [ServiceController::class, 'editWorkerServiceSubmit'])->name('service.edit.submit');

    Route::get('{id}/store-list', [ServiceController::class, 'workerStoreList'])->name('service.store.list');
    Route::get('/worker-product-list/{id}', [ServiceController::class, 'workerProductList'])->name('service.store.product.list');
});