<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GetDataController;
use App\Http\Controllers\Api\TransactionController as TransApi;
use App\Http\Controllers\Api\WarehouseController as WarehouseApi;
use App\Http\Controllers\Api\DetailsWarehouseController as DetailWarehouseApi;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);
Route::get('/get-role', [GetDataController::class, 'getrole']);
// Route::get('/get-warehouse', [GetDataController::class, 'getWarehouse']);

Route::group(
    ['middleware' => 'auth:sanctum'],
    function() {
        Route::get('/get-warehouse', [GetDataController::class, 'getWarehouse']);
        Route::get('/detail-warehouse/{id}', [GetDataController::class, 'getWarehouseDetails']);
        Route::get('/owner-warehouse/{id}', [GetDataController::class, 'getOwnerWarehouse']);
        Route::get('/customer-transaction/{id}', [GetDataController::class, 'getCustTransaction']);
        Route::get('/owner-transaction/{id}', [GetDataController::class, 'getOwnerTransaction']);
        Route::get('/get-customer/{id}', [GetDataController::class, 'getCust']);

        Route::controller(TransApi::class)->group(function() {
            Route::post('/store-transaction', 'store');
            Route::post('/update-transaction/{id}', 'update');
            
        });
        Route::controller(WarehouseApi::class)->group(function() {
            Route::post('/store-warehouse', 'store');
            Route::post('/update-warehouse/{id}', 'update');
            
        });
        Route::controller(DetailWarehouseApi::class)->group(function() {
            Route::post('/store-detail
            -warehouse', 'store');
            
        });
    }
);
