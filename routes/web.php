<?php

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

Route::get('/', 'DashboardController@index');

Route::namespace('Maintenance')->group(function() {
    Route::resource('mechanic', 'MechanicsController');

    Route::prefix('vehicle')->group(function(){
        Route::resource('category', 'VehicleCategoriesController');
        Route::resource('part', 'VehiclePartsController');
    });
    Route::resource('vehicle', 'VehiclesController');
    
    Route::prefix('service')->group(function(){
        Route::resource('category', 'ServiceCategoriesController');
    });
    Route::resource('service', 'ServicesController');
    
    Route::resource('customer', 'CustomersController');
    
});


Route::namespace('Transaction')->group(function(){
    Route::resource('inspection', 'InspectionController');
});