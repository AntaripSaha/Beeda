<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RealestateController;

Route::group(['prefix' => 'realestate', 'as' => 'realestate.', 'middleware' => ['StoreRegisterMiddleware']], function () {
    Route::get('/add-property/{id}', [RealestateController::class, 'addProperty'])->name('add.property');
    Route::post('/add-property', [RealestateController::class, 'addPropertySubmit'])->name('add.property.submit');
    Route::get('/edit-property/{id}/{shop_id}', [RealestateController::class, 'editProperty'])->name('edit.property');
    Route::post('/edit-property', [RealestateController::class, 'editPropertySubmit'])->name('edit.property.submit');
    Route::get('/property-list/{id}', [RealestateController::class, 'propertyList'])->name('property.list');
    Route::post('/publish-property', [RealestateController::class, 'publishProperty'])->name('property.publish');
    Route::get('/schedule-list/{id}', [RealestateController::class, 'scheduleList'])->name('schedule.list');
    Route::post('/schedule-status-change/{id}', [RealestateController::class, 'changeScheduleStatus'])->name('schedule.status.change');
    Route::get('/short-schedule-list', [RealestateController::class, 'shortScheduleList'])->name('short.schedule.list');
    Route::get('/schedule-details/{schedule_id}/{id}', [RealestateController::class, 'scheduleDetails'])->name('schedule.details');
    Route::get('/firebase-test', [RealestateController::class, 'firebaseTest'])->name('firebase.test');
    
});