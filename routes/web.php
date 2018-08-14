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

Route::get('/', function () {
    return view('welcome');
});

Route::namespace('Maintenance')->group(function() {
    Route::resource('mechanic', 'MechanicsController');
    Route::resource('vehicle', 'VehiclesController');
    Route::resource('category', 'CategoriesController');
    Route::resource('service', 'ServicesController');
    Route::resource('part', 'PartsController');
    Route::resource('customer', 'CustomersController');
    
});


Route::namespace('Transaction')->group(function(){
    
    //Inspection Transaction
    Route::resource('inspection', 'InspectionController');

});