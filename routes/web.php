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


Route::group([
		'prefix' => 'admin'
	],
	function () {
		Route::get('dashboard', 'DashboardController@index');
		
		// Maintenance routes
	Route::group([
			'prefix' => 'maintenance'
		],
		function () {
			
			//MECHANIC MAINTENANCE
			Route::get('/mechanic/mechanics', 'MaintenanceController@maintainMechanics');
			Route::get('/mechanic/create-mechanic', 'MaintenanceController@createTechnician');
			Route::get('/mechanic/{id}', 'MaintenanceController@viewMechanic');
			Route::post('/mechanic/mechanics', 'MaintenanceController@addMechanic');
			Route::post('/mechanic/mechanics', 'MaintenanceController@addMechanicForm');

			//VEHICLE MAINTENANCE
			Route::get('/vehicle/vehicles', 'MaintenanceController@maintainVehicles');
			Route::get('/vehicle/create-vehicle', 'MaintenanceController@createVehicles');
			Route::post('/vehicle/vehicles', 'MaintenanceController@addVehicle');

			//SERVICE CATEGORIES MAINTENANCE
			Route::get('/category/categories', 'MaintenanceController@maintainServiceCategory');
			Route::post('/category/categories', 'MaintenanceController@AddCategory');

			//SERVICE MAINTENANCE
			Route::get('/service/services', 'MaintenanceController@maintainServices');
			Route::get('/service/create-service', 'MaintenanceController@createService');
			Route::post('/service/services', 'MaintenanceController@addService');
			//PARTS MAINTENANCE
			Route::get('/part/parts', 'MaintenanceController@maintainParts');

			
		}
	);
	
	}
);
