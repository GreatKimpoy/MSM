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
    
    //MECHANIC MAINTENANCE
    Route::resource('mechanic', 'MechanicsController');
    // Route::get('mechanic/{id}', 'MaintenanceController@viewMechanic');
    // Route::post('mechanic/mechanics', 'MaintenanceController@addMechanic');
    // Route::post('mechanic/mechanics', 'MaintenanceController@addMechanicForm');

    //VEHICLE MAINTENANCE
    Route::resource('vehicle', 'VehiclesController');
    // Route::get('vehicle/vehicles', 'MaintenanceController@maintainVehicles');
    // Route::get('vehicle/create-vehicle', 'MaintenanceController@createVehicles');
    // Route::post('vehicle/vehicles', 'MaintenanceController@addVehicle');

    //SERVICE CATEGORIES MAINTENANCE
    Route::resource('category', 'CategoriesController');
    // Route::get('category/categories', 'MaintenanceController@maintainServiceCategory');
    // Route::post('category/categories', 'MaintenanceController@AddCategory');

    //SERVICE MAINTENANCE
    Route::resource('service', 'ServicesController');
    // Route::get('/service/services', 'MaintenanceController@maintainServices');
    // Route::get('/service/create-service', 'MaintenanceController@createService');
    // Route::post('/service/services', 'MaintenanceController@addService');

    //PARTS MAINTENANCE
    Route::resource('part', 'PartsController');
    // Route::get('/part/parts', 'MaintenanceController@maintainParts');
    
    //CUSTOMER MAINTENANCE
    Route::resource('customer', 'CustomersController');

    
});


Route::namespace('Transaction')->group(function(){
    
    //Inspection Transaction
    Route::resource('inspection', 'InspectionController');

    //Appointment Transaction
    Route::resource('appointments', 'AppointmentsController');
    

});