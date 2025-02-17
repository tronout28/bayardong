<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellPosController;
use App\Http\Controllers\Auth\LoginController;
use Modules\Superadmin\Http\Controllers\SubscriptionController;
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

Route::get('/sells/pos/get_product_row/{variation_id}/{location_id}', [SellPosController::class, 'getProductRow']);
Route::post('/sells/pos/get_payment_row', [SellPosController::class, 'getPaymentRow']);
Route::post('/sells/pos/get-reward-details', [SellPosController::class, 'getRewardDetails']);
Route::get('/sells/pos/get-recent-transactions', [SellPosController::class, 'getRecentTransactions']);
Route::get('/sells/pos/get-featured-products/{location_id}', [SellPosController::class, 'getFeaturedProducts']);

Route::post('/login', [LoginController::class, 'login']);

// In routes/api.php
Route::middleware('auth:api')->group(function () {
    Route::post('/midtrans', [SubscriptionController::class, 'pay_midtrans']);
    Route::get('/midtrans/snap/{id}', [SubscriptionController::class, 'snapView']);
});
