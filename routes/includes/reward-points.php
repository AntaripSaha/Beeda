<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\SettingController;

Route::group(['prefix' => 'settings', 'as' => 'settings.', 'middleware' => ['SuperAdminMiddleware']], function () {
    Route::get('/reward-points', [SettingController::class, 'rewardPoint'])->name('reward-points');
    Route::post('/reward-points', [SettingController::class, 'rewardPointUpdate'])->name('reward-points-update');
});