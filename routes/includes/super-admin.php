<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\DashboardController as SuperAdminDashboardController;
use App\Http\Controllers\SuperAdmin\LoginController as SuperAdminLoginController;
use App\Http\Controllers\SuperAdmin\CategoryController;
use App\Http\Controllers\SuperAdmin\BrandController;
use App\Http\Controllers\SuperAdmin\ProductController;
use App\Http\Controllers\SuperAdmin\ServiceController;
use App\Http\Controllers\SuperAdmin\DocumentController;
use App\Http\Controllers\SuperAdmin\SellerController;
use App\Http\Controllers\SuperAdmin\AttributeController;
use App\Http\Controllers\SuperAdmin\ColorController;
use App\Http\Controllers\SuperAdmin\BannerController;
use App\Http\Controllers\SuperAdmin\RealEstateAgentController;
use App\Http\Controllers\SuperAdmin\BlogController;
use App\Http\Controllers\SuperAdmin\CuisineController;
use App\Http\Controllers\SuperAdmin\WorldsBrandsController;
use App\Http\Controllers\SuperAdmin\CouponController;
use App\Http\Controllers\SuperAdmin\CustomerController;
use App\Http\Controllers\SuperAdmin\VehicleTypeController;
use App\Http\Controllers\SuperAdmin\LoanController;
use App\Http\Controllers\SuperAdmin\BeedaBlogController;

Route::middleware(['SuperAdminMiddleware'])->group(function () {
    Route::get('/super-admin/dashboard', [SuperAdminDashboardController::class, 'dashboard'])->name('super.admin.dashbaord');
    Route::get('/super-admin/dashboard/description-update', [SuperAdminDashboardController::class, 'descriptionUpdate'])->name('super.admin.description.update');
    Route::get('/category-list', [CategoryController::class, 'categoryList'])->name('category.list');
    Route::post('/feature-category', [CategoryController::class, 'featureCategory'])->name('category.feature');
    Route::post('/unfeature-category', [CategoryController::class, 'unfeatureCategory'])->name('category.unfeature');
    Route::get('/add-category', [CategoryController::class, 'addCategory'])->name('category.add');
    Route::post('/category-of-service', [CategoryController::class, 'categoryOfService'])->name('category.of.service');
    Route::post('/add-category', [CategoryController::class, 'addCategorySubmit'])->name('category.add.submit');
    Route::post('/tab-category', [CategoryController::class, 'tabCategory'])->name('category.tab');
    Route::post('/untab-category', [CategoryController::class, 'untabCategory'])->name('category.untab');
    Route::post('/mobile-top-category', [CategoryController::class, 'mobileTopCategory'])->name('category.mobileTop');
    Route::post('/unmobile-top-category', [CategoryController::class, 'unMobileTopCategory'])->name('category.unmobileTop');
    Route::post('/delete-category', [CategoryController::class, 'deleteCategory'])->name('category.delete');
    Route::get('/edit-category/{id}', [CategoryController::class, 'editCategory'])->name('category.edit');
    Route::post('/edit-category', [CategoryController::class, 'editCategorySubmit'])->name('category.edit.submit');
    Route::get('/brand-list', [BrandController::class, 'brandList'])->name('brand.list');
    Route::get('/add-brand', [BrandController::class, 'addBrand'])->name('brand.add');
    Route::post('/add-brand', [BrandController::class, 'addBrandSubmit'])->name('brand.add.submit');
    Route::post('/delete-brand', [BrandController::class, 'deleteBrand'])->name('brand.delete');
    Route::get('/edit-brand/{id}', [BrandController::class, 'editBrand'])->name('brand.edit');
    Route::post('/edit-brand', [BrandController::class, 'editBrandSubmit'])->name('brand.edit.submit');
    Route::get('/product-list', [ProductController::class, 'index'])->name('product.list');
    Route::get('/product-details/{id}', [ProductController::class, 'show'])->name('product.details');
    Route::get('/service-list', [ServiceController::class, 'serviceList'])->name('service.list');
    Route::get('/add-service', [ServiceController::class, 'addService'])->name('service.add');
    Route::post('/add-service', [ServiceController::class, 'addServiceSubmit'])->name('service.add.submit');
    Route::get('/edit-service/{id}', [ServiceController::class, 'editService'])->name('service.edit');
    Route::post('/edit-service', [ServiceController::class, 'editServiceSubmit'])->name('service.edit.submit');
    Route::post('/service-status', [ServiceController::class, 'serviceStatus'])->name('service.status');
    Route::get('/store-dashboard/{id}', [ServiceController::class, 'storeDashboard'])->name('service.store.dashboard');
    Route::get('/store-list/{id}', [ServiceController::class, 'storeList'])->name('service.store.list');
    Route::get('/store-product-list/{id}', [ServiceController::class, 'storeProductList'])->name('service.store.product.list');
    Route::post('/superadmin-publish-product', [ServiceController::class, 'superAdminPublishProduct'])->name('service.publish.product');
    Route::post('/superadmin-tab-product', [ServiceController::class, 'superAdminTabProduct'])->name('service.tab.product');
    Route::post('/superadmin-feature-product', [ServiceController::class, 'superAdminFeatureProduct'])->name('service.feature.product');
    Route::post('/superadmin-todaysdeal-product', [ServiceController::class, 'superAdminTodaysDealProduct'])->name('service.todaysdeal.product');
    Route::post('/store-approve', [ServiceController::class, 'storeApprove'])->name('service.store.approve');
    Route::post('/store-feature', [ServiceController::class, 'storeFeature'])->name('service.store.feature');

    // Beeda Blogs
    Route::get('/beeda-blog-list', [BeedaBlogController::class, 'blogList'])->name('beeda.blog.list');
    Route::get('/beeda-add-blog', [BeedaBlogController::class, 'addBlog'])->name('beeda.blog.add');
    Route::post('/beeda-add-blog', [BeedaBlogController::class, 'addBlogSubmit'])->name('beeda.blog.add.submit');
    Route::post('/beeda-delete-blog/{id}', [BeedaBlogController::class, 'deleteBlog'])->name('beeda.blog.delete');
    Route::get('/beeda-blog/{id}/edit', [BeedaBlogController::class, 'editBlog'])->name('beeda.blog.edit');
    Route::post('/beeda-edit-blog', [BeedaBlogController::class, 'editBlogSubmit'])->name('beeda.blog.edit.submit');
    Route::post('/beeda/blog/change-status', [BeedaBlogController::class, 'change_status'])->name('beeda.blog.change-status');


    Route::get('/agent-list', [RealEstateAgentController::class, 'agentList'])->name('service.agent.list');
    Route::get('/agent-property-list/{agent_id}', [RealEstateAgentController::class, 'agentPropertyList'])->name('service.agent.property.list');
    Route::post('/feature-agent-property', [RealEstateAgentController::class, 'featureAgentProperty'])->name('agent.property.feature');
    Route::post('/recommend-agent-property', [RealEstateAgentController::class, 'recommendAgentProperty'])->name('agent.property.recommend');

    Route::post('/driver-approve/global', [ServiceController::class, 'driverApproveGlobal'])->name('driver.approve');
    Route::post('/driver-approve', [ServiceController::class, 'driverApprove'])->name('service.driver.approve');
    Route::get('/store-order-list/{id}', [ServiceController::class, 'storeOrderList'])->name('service.store.order.list');
    Route::get('/store-order-details/{id}/{order_id}', [ServiceController::class, 'storeOrderDetails'])->name('service.store.order.details');
    Route::get('/store-document-list/{id}', [ServiceController::class, 'storeDocumentList'])->name('service.store.document.list');
    Route::get('/document-list', [DocumentController::class, 'documentList'])->name('document.list');
    Route::get('/add-document', [DocumentController::class, 'addDocument'])->name('document.add');
    Route::post('/add-document', [DocumentController::class, 'addDocumentSubmit'])->name('document.add.submit');
    Route::post('/approve-document', [DocumentController::class, 'approveDocument'])->name('document.approve');
    Route::get('/edit-document/{id}', [DocumentController::class, 'editDocument'])->name('document.edit');
    Route::post('/edit-document', [DocumentController::class, 'editDocumentSubmit'])->name('document.edit.submit');
    Route::get('/service-order-list/{id}', [ServiceController::class, 'serviceOrderList'])->name('service.order.list');
    Route::get('/seller-list', [SellerController::class, 'sellerList'])->name('seller.list');
    Route::get('/seller-document-list/{id}', [SellerController::class, 'sellerDocumentList'])->name('seller.document.list');
    Route::get('/seller-details/{id}', [SellerController::class, 'details'])->name('seller.details');
    Route::get('/seller-login/{id}', [SellerController::class, 'login'])->name('seller.login');
    Route::post('/approve-seller', [SellerController::class, 'approveSeller'])->name('seller.approve');
    Route::get('/seller-details', [SellerController::class, 'sellerDetails'])->name('seller.details');
    Route::get('/attribute-list', [AttributeController::class, 'attributeList'])->name('service.attribute.list');
    Route::get('/add-attribute', [AttributeController::class, 'addAttribute'])->name('service.attribute.add');
    Route::post('/add-attribute', [AttributeController::class, 'addAttributeSubmit'])->name('service.attribute.add.submit');
    Route::post('/delete-attribute', [AttributeController::class, 'deleteAttribute'])->name('service.attribute.delete');
    Route::get('/edit-attribute/{id}', [AttributeController::class, 'editAttribute'])->name('service.attribute.edit');
    Route::post('/edit-attribute', [AttributeController::class, 'editAttributeSubmit'])->name('service.attribute.edit.submit');
    Route::get('/color-list', [ColorController::class, 'colorList'])->name('service.color.list');
    Route::get('/add-color', [ColorController::class, 'addColor'])->name('service.color.add');
    Route::post('/add-color', [ColorController::class, 'addColorSubmit'])->name('service.color.add.submit');
    Route::post('/delete-color', [ColorController::class, 'deleteColor'])->name('service.color.delete');
    Route::get('/edit-color/{id}', [ColorController::class, 'editColor'])->name('service.color.edit');
    Route::post('/edit-color', [ColorController::class, 'editColorSubmit'])->name('service.color.edit.submit');
    Route::get('/coupon-list', [CouponController::class, 'couponList'])->name('service.coupon.list');
    Route::get('/add-coupon', [CouponController::class, 'addCoupon'])->name('service.coupon.add');
    Route::post('/add-coupon', [CouponController::class, 'addCouponSubmit'])->name('service.coupon.submit');
    Route::post('/delete-coupon', [CouponController::class, 'deleteCoupon'])->name('service.coupon.delete');
    Route::get('/edit-coupon/{id}', [CouponController::class, 'editCoupon'])->name('service.coupon.edit');
    Route::post('/edit-coupon', [CouponController::class, 'editCouponSubmit'])->name('service.coupon.edit.submit');
    Route::get('/banner-list', [BannerController::class, 'bannerList'])->name('banner.list');
    Route::get('/add-banner', [BannerController::class, 'addBanner'])->name('banner.add');
    Route::post('/add-banner', [BannerController::class, 'addBannerSubmit'])->name('banner.add.submit');
    Route::get('/edit-banner/{id}', [BannerController::class, 'editBanner'])->name('banner.edit');
    Route::post('/edit-banner', [BannerController::class, 'editBannerSubmit'])->name('banner.edit.submit');
    Route::post('/publish-banner', [BannerController::class, 'publishBanner'])->name('banner.publish');
    Route::post('/service-category-products', [BannerController::class, 'serviceCategoryProducts'])->name('banner.service.category.products');
    Route::post('/service-category-shops', [BannerController::class, 'serviceCategoryShops'])->name('banner.service.category.shops');
    Route::post('super-admin/logout', [SuperAdminLoginController::class, 'logout'])->name('super.admin.logout');

    // News & Promotions route
    Route::resource('blog', BlogController::class);
    Route::post('/blog/destroy/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');
    Route::post('/blog/change-status', [BlogController::class, 'change_status'])->name('blog.change-status');

    Route::get('/beeda/section_banner', [CategoryController::class, 'beedamalHomeSectionCategories'])->name('home.section.category');
    Route::post('/beeda/section_banner/update', [CategoryController::class, 'updateBeedamalHomeSectionCategories'])->name('update.home.section.category');

    Route::get('/beeda/pharmacy_section_category', [CategoryController::class, 'pharmacyHomeSectionCategories'])->name('pharmacy.section.category');
    Route::post('/beeda/pharmacy_section_category/update', [CategoryController::class, 'updatePharmacyHomeSectionCategories'])->name('update.pharmacy.section.category');

    //loan
    Route::prefix('loan')->group(function () {
        Route::get('/index', [LoanController::class, 'index'])->name('loan.index');
        Route::get('/loan-types', [LoanController::class, 'loanTypes'])->name('loan.types');
        Route::get('/add-loan-types', [LoanController::class, 'addLoanTypes'])->name('loan.type.add');
        Route::post('/store-loan-types', [LoanController::class, 'storeLoanType'])->name('loan.type.store');
        Route::post('/update-loan-types', [LoanController::class, 'updateLoanType'])->name('loan.type.update');
        Route::get('/edit/{id}', [LoanController::class, 'edit'])->name('loan.edit');
        Route::get('/show/{id}', [LoanController::class, 'show'])->name('loan.show');
        Route::post('/status-change', [LoanController::class, 'changeStatus'])->name('loan.status');
    });

    //Test. I will remove it later. And I will add a new route for this.
    // Route::get('/super-admin/flight-search', [SuperAdminDashboardController::class, 'flightSearch'])->name('super.admin.dashbaord');
    // Route::get('/super-admin/user-info', [SuperAdminDashboardController::class, 'UserInfo'])->name('dashboard.temp');
    // Route::get('/super-admin/payment-details', [SuperAdminDashboardController::class, 'paymentDetails'])->name('dashboard.payment-details');
    // Route::get('/super-admin/success', [SuperAdminDashboardController::class, 'success'])->name('dashboard.payment-success');
    //Test

    Route::prefix('worlds-brands')->group(function () {
        Route::get('/', [WorldsBrandsController::class, 'index'])->name('worlds-brands.index');
        Route::get('/add', [WorldsBrandsController::class, 'create'])->name('worlds-brands.add');
        Route::post('/store', [WorldsBrandsController::class, 'store'])->name('worlds-brands.store');
        Route::get('/edit/{id}', [WorldsBrandsController::class, 'edit'])->name('worlds-brands.edit');
        Route::post('/update', [WorldsBrandsController::class, 'update'])->name('worlds-brands.update');
        Route::get('/delete/{id}', [WorldsBrandsController::class, 'delete'])->name('worlds-brands.delete');
        Route::get('/{id}/shops', [WorldsBrandsController::class, 'shops'])->name('worlds-brands.shops');
        Route::post('/{id}/shops', [WorldsBrandsController::class, 'shopsSubmit'])->name('worlds-brands.shops-submit');
    });

    Route::prefix('superadmin/cuisine')->as('superadmin.cuisine.')->group(function () {
        Route::get('/', [CuisineController::class, 'index'])->name('index');
        Route::get('/add', [CuisineController::class, 'create'])->name('add');
        Route::post('/store', [CuisineController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CuisineController::class, 'edit'])->name('edit');
        Route::post('/update', [CuisineController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [CuisineController::class, 'delete'])->name('delete');
    });

    Route::prefix('superadmin/customer')->as('superadmin.customer.')->group(function () {
        Route::get('/list', [CustomerController::class, 'index'])->name('index');
        Route::get('{id}/details', [CustomerController::class, 'details'])->name('details');
        Route::get('{id}/login-activity', [CustomerController::class, 'loginActivity'])->name('login-activity');
        Route::get('{id}/order-list', [CustomerController::class, 'orderList'])->name('order.list');
        Route::get('{id}/order_details', [CustomerController::class, 'orderDetails'])->name('customer.order.details');
        Route::get('{id}/ride-list', [CustomerController::class, 'rideList'])->name('ride.list');
        Route::get('{id}/ride-details', [CustomerController::class, 'rideDetails'])->name('ride.details');
        Route::get('{id}/login', [CustomerController::class, 'login'])->name('login');
    });

    Route::prefix('superadmin/transport')->as('superadmin.transport.')->group(function () {
        Route::prefix('vehicle-category')->as('vehicle-category.')->group(function () {
            Route::get('/', [VehicleTypeController::class, 'index'])->name('index');
        });
    });
});

Route::get('/super-admin', [SuperAdminLoginController::class, 'login'])->name('super.admin.login');
Route::post('/super-admin/login-submit', [SuperAdminLoginController::class, 'loginSubmit'])->name('super.admin.login.submit');
