<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\VoucherController;

Route::group(['prefix' => 'voucher', 'as' => 'voucher.', 'middleware' => ['SuperAdminMiddleware']], function () {
    Route::get('', [VoucherController::class, 'index'])->name('index');
    Route::get('/download-vouchers/{id}', [VoucherController::class, 'voucherDownload'])->name('download.vouchers');
    Route::post('/generate', [VoucherController::class, 'generateVoucherBatch'])->name('generate');
    Route::get('/active-vouchers', [VoucherController::class, 'activeVouchers'])->name('active.vouchers');
});