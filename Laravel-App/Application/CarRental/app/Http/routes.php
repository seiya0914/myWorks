<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','PageController@index');

//Route::get('/vehicles/','PageController@displayAllvehicles');

//Routes for customer management
Route::get('/customers/', 'CustomerController@displayAllCustomers');
Route::get('/addcustomer/','CustomerController@displayForm');
Route::post('/addcustomer/','CustomerController@saveRecord');
Route::delete('/deletecustomer/{customer}','CustomerController@deleteCustomer');
Route::get('/updatecustomer/{customer}','CustomerController@displayEditForm');
Route::post('/updatecustomer/','CustomerController@update');
Route::get('searchCustomer/','CustomerController@searchCustomer');

//Routes for vehicle management
Route::get('/vehicles/','VehicleController@displayAllVehicles');
Route::get('/addvehicle/','VehicleController@displayForm');
Route::post('/addvehicle/','VehicleController@saveRecord');
Route::delete('/deletevehicle/{vehicle}','VehicleController@deleteVehicle');
Route::get('/updatevehicle/{vehicle}','VehicleController@displayEditForm');
Route::post('updatevehicle/','VehicleController@update');
Route::post('retire','VehicleController@retire');
Route::get('/searchVehicle/',"VehicleController@searchVehicle");

//Routes for location management
Route::get('/locations/','LocationController@displayAllLocations');
Route::get('/addlocation/','LocationController@displayForm');
Route::post('/addlocation/','LocationController@saveRecord');
Route::delete('/deletelocation/{location}','LocationController@deleteLocation');
Route::get('/updatelocation/{location}','LocationController@displayEditForm');
Route::post('updatelocation/','LocationController@update');
Route::get('searchLocation','LocationController@searchLocation');

//Routes for booking management
Route::get('/bookings/','BookingController@displayAllBookings');
Route::get('/addbooking/','BookingController@displayForm');
Route::post('/addbooking/','BookingController@saveRecord');
Route::delete('/deletebooking/{booking}','BookingController@deleteBooking');
Route::get('updatebooking/{booking}','BookingController@displayEditForm');
Route::post('updatebooking','BookingController@update');
Route::get('searchBooking','BookingController@searchBooking');
Route::post('return','BookingController@returnCar');

//Routes for faults and damage manamgent
Route::get('/FAD/','FadController@displayAllFAD');
Route::get('/addFAD/','FadController@displayForm');
Route::post('/addFAD/','FadController@addFAD');
Route::delete('/deleteFAD/{FAD}','FadController@deleteFAD');
Route::get('updateFAD/{FAD}','FadController@displayEditForm');
Route::post('updateFAD','FadController@update');
Route::get('searchFAD','FadController@searchFAD');
Route::get('addFADType','FadController@displayTypeForm');
Route::post('addFADType','FadController@addType');

Route::get('/login/','PageController@login');
Route::auth();

Route::get('/home', 'HomeController@index');

Route::controller('datatables', 'DatatablesController', [
    'anyData'  => 'datatables.data',
    'getIndex' => 'datatables',
]);