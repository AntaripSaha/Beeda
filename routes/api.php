<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\VoucherController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\SubscriberController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/voucher-otp', [VoucherController::class, 'sendVoucherOTP']);

Route::get('/all-blogs', [BlogController::class, 'index']);
Route::get('/allBlogs', [BlogController::class, 'allBlogs']);
Route::get('/blogs/{slug}', [BlogController::class, 'show']);
Route::get('/subscribe/index', [SubscriberController::class, 'index']);
Route::post('/subscribe/store', [SubscriberController::class, 'store']);

