<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\ServiceController;
use App\Http\Controllers\SuperAdmin\VehicleTypeController;

use App\Http\Controllers\SuperAdmin\MilestoneController;


Route::group(['prefix' => 'transport', 'as' => 'transport.', 'middleware' => ['SuperAdminMiddleware']], function () {
    Route::get('/service-list', [ServiceController::class, 'transportServiceList'])->name('service.list');
    Route::get('/all-drivers', [ServiceController::class, 'allDrivers'])->name('service.all-drivers');
    Route::get('/all-rides', [ServiceController::class, 'allRideList'])->name('service.all-rides');
    Route::get('/add-service', [ServiceController::class, 'addTransportService'])->name('service.add');
    Route::post('/add-service', [ServiceController::class, 'addTransportServiceSubmit'])->name('service.add.submit');
    Route::get('/edit-service/{id}', [ServiceController::class, 'editTransportService'])->name('service.edit');
    Route::post('/edit-service', [ServiceController::class, 'editTransportServiceSubmit'])->name('service.edit.submit');
    Route::get('/transport-dashboard/{id}', [ServiceController::class, 'transportDashboard'])->name('service.store.dashboard');
    Route::get('/{service}/ride-list', [ServiceController::class, 'rideList'])->name('ride.list');
    Route::get('{id}/driver-list', [ServiceController::class, 'driverList'])->name('service.driver.list');
    Route::get('{id}/driver-list/{driver}/rating', [ServiceController::class, 'driverRatingList'])->name('service.driver.rating.list');
    Route::get('{id}/rides/{driver}', [ServiceController::class, 'driverRidesList'])->name('service.driver.rides.list');
    Route::get('ride-details/{ride}', [ServiceController::class, 'rideDetails'])->name('ride.details');
    Route::get('{id}/driver-list/{driver}/documents', [ServiceController::class, 'driverDocumentsList'])->name('service.driver.documents.list');

    Route::group(['prefix' => 'milestone', 'as' => 'milestone.'], function () {
        Route::get('/list', [MilestoneController::class, 'index'])->name('list');
        Route::get('/create', [MilestoneController::class, 'create'])->name('create');
        Route::post('/store', [MilestoneController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [MilestoneController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [MilestoneController::class, 'update'])->name('update');
        // Route::post('/approve', [MilestoneController::class, 'approve'])->name('approve');
    });

    Route::group(['prefix' => 'vehicle', 'as' => 'vehicle.'], function () {
        Route::get('/list', [VehicleTypeController::class, 'index'])->name('list');
        Route::get('/create', [VehicleTypeController::class, 'create'])->name('create');
        Route::post('/store', [VehicleTypeController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [VehicleTypeController::class, 'edit'])->name('edit');
        Route::post('/update', [VehicleTypeController::class, 'update'])->name('update');
        Route::post('/approve', [VehicleTypeController::class, 'approve'])->name('approve');
    });

    Route::group(['prefix' => 'vehicle-type', 'as' => 'vehicle-type.'], function () {
        Route::get('/list', [VehicleTypeController::class, 'vehicleTypeList'])->name('list');
        Route::get('/create', [VehicleTypeController::class, 'vehicleTypecreate'])->name('create');
        Route::post('/store', [VehicleTypeController::class, 'vehicleTypestore'])->name('store');
        Route::get('/edit/{id}', [VehicleTypeController::class, 'vehicleTypeedit'])->name('edit');
        Route::post('/update', [VehicleTypeController::class, 'vehicleTypeupdate'])->name('update');
        Route::post('/change-status', [VehicleTypeController::class, 'vehicleTypevisible'])->name('change.status');
    });

    Route::group(['prefix' => 'vehicle-sub-type', 'as' => 'vehicle-sub-type.'], function () {
        Route::get('/assign-vehicle-sub-type/{id}', [VehicleTypeController::class, 'assignVehicleSubType'])->name('assign');
        Route::post('/assign-vehicle-sub-type', [VehicleTypeController::class, 'assignVehicleSubTypeSubmit'])->name('assign.submit');
        Route::post('/change-status', [VehicleTypeController::class, 'vehicleSubTypevisible'])->name('change.status');
        Route::get('/assign-vehicle-icon/{id}', [VehicleTypeController::class, 'assignVehicleIcon'])->name('assign.vehicle.icon');
        Route::post('/assign-vehicle-icon', [VehicleTypeController::class, 'assignVehicleIconSubmit'])->name('assign.vehicle.icon.submit');
    });

    Route::group(['prefix' => 'vehicle-icon', 'as' => 'vehicle-icon.'], function () {
        Route::get('/list', [VehicleTypeController::class, 'vehicleIconList'])->name('list');
        Route::get('/create', [VehicleTypeController::class, 'vehicleIconCreate'])->name('create');
        Route::post('/store', [VehicleTypeController::class, 'vehicleIconStore'])->name('store');
        Route::get('/edit/{id}', [VehicleTypeController::class, 'vehicleIconEdit'])->name('edit');
        Route::post('/update', [VehicleTypeController::class, 'vehicleIconUpdate'])->name('update');
    });
});

require __DIR__ . '/transport/courier.php';
