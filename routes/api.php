<?php

use App\Constants\ResponseMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CarbonController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\NewsController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\TreeController;

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

/**
 * HEALTH CHECK
 */
Route::get('/health', function () {
    return response()->json(['status' => 'OK']);
});

/**
 * AUTH ROUTES
 */
Route::controller(UserController::class)
    ->prefix('auth')
    ->group(
        function () {
            Route::post('/login', 'login');
            Route::post('/register', 'register');
        }
    );
Route::controller(UserController::class)
    ->middleware('auth.jwt')
    ->prefix('auth')
    ->group(
        function () {
            Route::get('/refresh', 'refresh');
            Route::post('/logout', 'logout');
        }
    );

/**
 * USER ROUTES
 */
Route::controller(UserController::class)
    ->middleware('auth.jwt')
    ->prefix('users')
    ->group(
        function () {
            Route::get('/', 'detail');
            Route::put('/', 'update');
            Route::put('/edit_password', 'edit_password');
        }
    );

/**
 * CARBON ROUTES
 */
Route::controller(CarbonController::class)
    ->middleware('auth.jwt')
    ->prefix('carbon')
    ->group(
        function () {
            Route::get('/calculator/type', 'get_item_calculator');
            Route::post('/calculator', 'count_carbon_offset');
            Route::get('/', 'carbon_detail');
        }
    );

/**
 * PRODUCT ROUTES
 */
Route::controller(ProductController::class)
    ->middleware('auth.jwt')
    ->prefix('products')
    ->group(
        function () {
            Route::get('/adopt', 'product_adopt');
            Route::get('/planting', 'product_planting');
            Route::get('/adopt/{id}', 'adopt_detail');
            Route::get('/planting/{id}', 'planting_detail');
        }
    );

/**
 * NEWS ROUTES
 */
Route::controller(NewsController::class)
    ->middleware('auth.jwt')
    ->prefix('news')
    ->group(
        function () {
            Route::get('/', 'index');
            Route::get('/{id}', 'detail');
        }
    );

/**
 * TREE ROUTES
 */
Route::controller(TreeController::class)
    ->middleware('auth.jwt')
    ->prefix('trees')
    ->group(
        function () {
            Route::get('/', 'get_tree_user');
            Route::get('/{id}', 'get_detail_tree');
        }
    );

/**
 * TRANSACTION ROUTES
 */
Route::middleware('auth.jwt')
    ->controller(TransactionController::class)
    ->prefix('transactions')
    ->group(
        function () {
            // Transaction
            Route::get('/', 'index');
            Route::get('/{id}', 'get_detail');
            Route::get('/payment_methods', 'get_payment_method');
            Route::post('/adopt', 'store_adopt');
            Route::post('/planting', 'store_planting');

            // Reedem Code
            Route::get('/redeem_code/{code}', 'redeem_code');
            Route::post('/redeem_code', 'use_voucher');
        }
    );
