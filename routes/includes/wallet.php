<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\SuperAdmin\WalletController as SuperadminWalletController;

Route::group(['prefix' => 'wallet', 'as' => 'wallet.', 'middleware' => ['SuperAdminMiddleware']], function () {
    Route::get('', [SuperadminWalletController::class, 'index'])->name('index');
    Route::get('/bank-transfer', [SuperadminWalletController::class, 'bankTransfer'])->name('bank-transfer');
    Route::post('/bank-transfer-status', [SuperadminWalletController::class, 'bankTransferStatus'])->name('bank-transfer-status');
    Route::get('/qr-code', [SuperadminWalletController::class, 'qrCode'])->name('qr-code');
    Route::get('/pin-reset-requests', [SuperadminWalletController::class, 'pinResetRequests'])->name('pin-reset-requests');
    Route::get('/approve-pin-request/{id}', [SuperadminWalletController::class, 'approvePinRequest'])->name('approve-pin-request');
    Route::get('/details/{pin_request_id}', [SuperadminWalletController::class, 'details'])->name('details');
    Route::get('/transactions/{id}', [SuperadminWalletController::class, 'transactionDetails'])->name('transaction-details');
});

Route::get('seller/my-wallet', [WalletController::class, 'index'])->name('seller.wallet.index');
Route::get('seller/my-wallet/personal-account', [WalletController::class, 'personalAccount'])->name('seller.wallet.personal-account');
Route::get('seller/my-wallet/store-account', [WalletController::class, 'storeAccount'])->name('seller.wallet.store-account');
Route::get('seller/my-wallet/qr-code', [WalletController::class, 'qrCode'])->name('seller.wallet.qr-code');