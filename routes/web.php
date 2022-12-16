<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\UserController as UserControllerAdmin;
use App\Http\Controllers\Admin\OwnerController as OwnerControllerAdmin;
use App\Http\Controllers\Admin\CustomerController as CustomerControllerAdmin;
use App\Http\Controllers\Admin\WarehouseController as WarehouseControllerAdmin;
use App\Http\Controllers\Admin\DetailWarehouseController as DetailWarehouseControllerAdmin;
use App\Http\Controllers\Admin\TransactionController as TransactionControllerAdmin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Auth::routes();

Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        });
        Route::controller(UserControllerAdmin::class)->group(function() {
            Route::get('/user', 'index');
            Route::get('/user-edit/{id}', 'edit');
            Route::get('/user-detail/{id}', 'show');
            Route::post('/user-update/{id}', 'update');
            Route::delete('/user/{id}', 'destroy');
        });
        Route::controller(OwnerControllerAdmin::class)->group(function() {
            Route::get('/owner', 'index');
            Route::get('/owner-edit/{id}', 'edit');
            Route::get('/owner-detail/{id}', 'show');
            Route::post('/owner-update/{id}', 'update');
            Route::delete('/owner/{id}', 'destroy');
        });
        Route::controller(CustomerControllerAdmin::class)->group(function() {
            Route::get('/customer', 'index');
            Route::get('/customer-edit/{id}', 'edit');
            Route::get('/customer-detail/{id}', 'show');
            Route::post('/customer-update/{id}', 'update');
            Route::delete('/customer/{id}', 'destroy');
        });
        Route::controller(WarehouseControllerAdmin::class)->group(function() {
            Route::get('/warehouse', 'index');
            Route::get('/warehouse-edit/{id}', 'edit');
            Route::get('/warehouse-detail/{id}', 'show');
            Route::post('/warehouse-update/{id}', 'update');
            Route::delete('/warehouse/{id}', 'destroy');
        });
        Route::controller(DetailWarehouseControllerAdmin::class)->group(function() {
            Route::get('/detail-warehouse', 'index');
            Route::get('/detail-warehouse-edit/{id}', 'edit');
            Route::get('/detail-warehouse-detail/{id}', 'show');
            Route::post('/detail-warehouse-update/{id}', 'update');
            Route::delete('/detail-warehouse/{id}', 'destroy');
        });
        Route::controller(TransactionControllerAdmin::class)->group(function() {
            Route::get('/transaction', 'index');
            Route::get('/transaction-edit/{txid}', 'edit');
            Route::get('/transaction-detail/{txid}', 'show');
            Route::post('/transaction-update/{txid}', 'update');
            Route::delete('/transaction/{txid}', 'destroy');
        });
    });
});

Route::group(['prefix' => 'tables'], function(){
    Route::get('basic-table', function () { return view('pages.tables.basic-table'); });
    Route::get('data-table', function () { return view('pages.tables.data-table'); });
    Route::get('js-grid', function () { return view('pages.tables.js-grid'); });
    Route::get('sortable-table', function () { return view('pages.tables.sortable-table'); });
});


Route::get('/owners', function () {
    return view('pages.owners');
});
Route::get('/customers', function () {
    return view('pages.customers');
});
Route::get('/warehouses', function () {
    return view('pages.warehouses');
});
Route::get('/transactions', function () {
    return view('pages.transactions');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/config', function () {
    Artisan::call(
        'migrate:fresh',
        [
            '--force' => true,
        ]
    );
    Artisan::call(
        'db:seed',
        [
            '--force' => true,
        ]
    );
});