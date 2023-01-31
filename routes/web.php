<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChatController;

require __DIR__ . '/includes/store-register.php';
require __DIR__ . '/includes/auth.php';
require __DIR__ . '/includes/super-admin.php';

require __DIR__ . '/includes/transport.php';
require __DIR__ . '/includes/food.php'; 
require __DIR__ . '/includes/worker.php';

require __DIR__ . '/includes/wallet.php';
require __DIR__ . '/includes/voucher.php';
require __DIR__ . '/includes/revenue.php';

require __DIR__ . '/includes/realstate.php';
require __DIR__ . '/includes/default-video.php';
require __DIR__ . '/includes/reward-points.php';

require __DIR__ . '/includes/subscriptions.php';

Route::get('/chats', [ChatController::class, 'getChats'])->name('chat.get');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/{path?}', [HomeController::class, 'index'])->name('home.index');