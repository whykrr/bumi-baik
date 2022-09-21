<?php

use App\Constants\ResponseMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CarbonController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\NewsController;

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
Route::middleware('auth.jwt')
    ->controller(UserController::class)
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
Route::middleware('auth.jwt')
    ->controller(UserController::class)
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
Route::middleware('auth.jwt')
    ->controller(CarbonController::class)
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
Route::middleware('auth.jwt')
    ->controller(CarbonController::class)
    ->prefix('products')
    ->group(
        function () {
            Route::get('/adopt', function () {
                return response()->json(['message' => ResponseMessage::SUCCESS_RETRIEVE, 'data' => []]);
            });
            Route::get('/planting', function () {
                return response()->json(['message' => ResponseMessage::SUCCESS_RETRIEVE, 'data' => []]);
            });
            Route::get('/adopt/{id}', function () {
                return response()->json(['message' => ResponseMessage::SUCCESS_RETRIEVE, 'data' => []]);
            });
            Route::get('/planting/{id}', function () {
                return response()->json(['message' => ResponseMessage::SUCCESS_RETRIEVE, 'data' => []]);
            });
        }
    );

/**
 * NEWS ROUTES
 */
Route::middleware('auth.jwt')
    ->controller(NewsController::class)
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
Route::middleware('auth.jwt')
    ->controller(CarbonController::class)
    ->prefix('trees')
    ->group(
        function () {
            Route::get('/', function () {
                return response()->json(['message' => ResponseMessage::SUCCESS_RETRIEVE, 'data' => []]);
            });
            Route::get('/{id}', function () {
                return response()->json(['message' => ResponseMessage::SUCCESS_RETRIEVE, 'data' => []]);
            });
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
            // Reedem Code
            Route::get('/redeem_code/{code}', 'redeem_code');
            Route::post('/redeem_code', 'use_voucher');
        }
    );
