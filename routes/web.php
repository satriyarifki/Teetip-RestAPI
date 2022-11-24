<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
        Route::controller(OwnerControllerAdmin::class)->group(function() {
            Route::get('/owner', 'index');
            Route::get('/owner-edit/{id}', 'edit');
            Route::post('/owner-update/{id}', 'update');
            Route::delete('/owner/{id}', 'destroy');
        });
        Route::controller(CustomerControllerAdmin::class)->group(function() {
            Route::get('/customer', 'index');
            Route::get('/customer-edit/{id}', 'edit');
            Route::post('/customer-update/{id}', 'update');
            Route::delete('/customer/{id}', 'destroy');
        });
        Route::controller(WarehouseControllerAdmin::class)->group(function() {
            Route::get('/warehouse', 'index');
            Route::get('/warehouse-edit/{id}', 'edit');
            Route::post('/warehouse-update/{id}', 'update');
            Route::delete('/warehouse/{id}', 'destroy');
        });
        Route::controller(DetailWarehouseControllerAdmin::class)->group(function() {
            Route::get('/detail-warehouse', 'index');
            Route::get('/detail-warehouse-edit/{id}', 'edit');
            Route::post('/detail-warehouse-update/{id}', 'update');
            Route::delete('/detail-warehouse/{id}', 'destroy');
        });
        Route::controller(TransactionControllerAdmin::class)->group(function() {
            Route::get('/transaction', 'index');
            Route::get('/transaction-edit/{txid}', 'edit');
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
