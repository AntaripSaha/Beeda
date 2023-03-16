<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiceItemController;
use App\Http\Controllers\ShopSettingController;
use App\Http\Controllers\DeliveryZoneController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WalletController;

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::middleware(['StoreRegisterMiddleware'])->group(function () {

    // Store Register
    Route::get('/seller/email/verify', [RegisterController::class, 'storeEmailVerifyGet'])->name('register.storeEmailVerifyGet');
    Route::get('/seller/phone/verify', [RegisterController::class, 'storePhoneVerifyGet'])->name('register.storePhoneVerifyGet');
    Route::post('/seller/email/verify/submit', [RegisterController::class, 'storeEmailVerify'])->name('register.storeEmailVerifySubmit');
    Route::post('/seller/phone/verify/submit', [RegisterController::class, 'storePhoneVerify'])->name('register.storePhoneVerifySubmit');
    Route::post('/resent-otp', [RegisterController::class, 'resent_otp'])->name('register.resent_otp');
    Route::get('/store-register/{page_type?}', [RegisterController::class, 'storeRegisterGet'])->name('register.storeRegisterGet');
    Route::post('/personal-details-update', [RegisterController::class, 'updatePersonalDetails'])->name('register.update.personal.details');
    Route::post('/add-services', [RegisterController::class, 'addServices'])->name('register.add.services');
    Route::post('/add-store-details', [RegisterController::class, 'addStoreDetails'])->name('register.add.store.details');
    Route::get('/get-service-document/{id}', [RegisterController::class, 'getServiceDocument'])->name('register.get.service.document');
    Route::post('/logout', [LoginController::class, 'logout'])->name('login.logout');


    // Service Item
    Route::get('/service-item/{id}', [ServiceItemController::class, 'serviceItem'])->name('service.item.index');
    Route::get('/add-service-item/{id}', [ServiceItemController::class, 'addServiceItem'])->name('service.add.item');
    Route::post('/get-possible-combination', [ServiceItemController::class, 'getPossibleAttributeCombination'])->name('service.get.attr.combs');
    Route::post('/get-service-category-pre-data', [ServiceItemController::class, 'getServiceCategoryPreData'])->name('service.get.pre.data');
    Route::post('/add-service-item-submit', [ServiceItemController::class, 'addServiceItemSubmit'])->name('service.add.item.submit');
    Route::get('/service-item-list/{id}', [ServiceItemController::class, 'serviceItemList'])->name('service.item.list');
    Route::post('/publish-product', [ServiceItemController::class, 'publishProduct'])->name('service.item.publish');
    Route::post('/feature-product', [ServiceItemController::class, 'featureProduct'])->name('service.item.feature');
    Route::get('/edit-service-item/{id}', [ServiceItemController::class, 'editServiceItem'])->name('service.item.edit');
    Route::post('/update-service-item', [ServiceItemController::class, 'updateServiceItem'])->name('service.item.update');

    // Shop Setting
    Route::get('/shop-setting', [ShopSettingController::class, 'shopSetting'])->name('shop.setting');
    Route::get('/edit-shop/{id}', [ShopSettingController::class, 'editShop'])->name('shop.edit');
    Route::post('/update-shop', [ShopSettingController::class, 'updateShop'])->name('shop.update');

    // Delivery Zone
    Route::get('/delivery-zone-list', [DeliveryZoneController::class, 'deliveryZoneList'])->name('delivery.zone.list');
    Route::get('/add-delivery-zone', [DeliveryZoneController::class, 'addDeliveryZone'])->name('add.delivery.zone');
    Route::post('/add-delivery-zone-submit', [DeliveryZoneController::class, 'addDeliveryZoneSubmit'])->name('add.delivery.zone.submit');
    Route::get('/edit-delivery-zone/{id}', [DeliveryZoneController::class, 'editDeliveryZone'])->name('edit.delivery.zone');
    Route::post('/edit-delivery-zone-submit', [DeliveryZoneController::class, 'editDeliveryZoneSubmit'])->name('edit.delivery.zone.submit');
    Route::post('/delete-delivery-zone', [DeliveryZoneController::class, 'deleteDeliveryZone'])->name('delete.delivery.zone');

    // Product Reviews
    Route::get('/product-reviews', [ProductReviewController::class, 'productReviews'])->name('product.reviews');

    // Orders
    Route::get('/order-list', [OrderController::class, 'orderList'])->name('order.list');
    Route::get('/order-details/{id}', [OrderController::class, 'orderDetails'])->name('order.details');
    Route::get('/short-order-list', [OrderController::class, 'shortOrderList'])->name('short.order.list');
    Route::post('/make-payment', [OrderController::class, 'makePayment'])->name('order.make.payment');
    Route::post('/change-delivery-status', [OrderController::class, 'changeDeliveryStatus'])->name('order.change.delivery.status');
    Route::get('/wallet', [WalletController::class, 'index'])->name('seller.wallet');
});
