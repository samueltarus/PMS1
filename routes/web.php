<?php

use Illuminate\Support\Facades\Route;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

  Route::group(['middleware' => 'auth','admin'], function () {


// admin routes
Route::get('admin','DashboardController@admin_dashboard')->name('admin_dashboard');
Route::get('all-landlords','LandlordController@all_landlord');
Route::get('add-landlord','LandlordController@add_landlord');
Route::post('save-landlord','LandlordController@save_landlord');
Route::get('show-landlord/{id}','LandlordController@show_landlord');
Route::get('edit-landlord/{id}','LandlordController@edit_landlord');
Route::post('update-landlord/{id}','LandlordController@update_landlord');
Route::get('delete-landlord/{id}','LandlordController@delete_landlord');
Route::get('edit-landlord-profile/{id}', 'LandlordController@edit_landlord_profile');
Route::post('update-landlord-profile/{id}','LandlordController@update_landlord_profile');


//properties routes

Route::get('all-properties','PropertyController@all_properties');
Route::get('add-property','PropertyController@add_property');
Route::post('save-property','PropertyController@save_property');
Route::get('edit-property/{id}','PropertyController@edit_property');
Route::post('update-property/{id}','PropertyController@update_property');
Route::get('delete-property/{id}','PropertyController@delete_property');
//tenants routes

Route::get('all-tenants','TenantController@all_tenants');
Route::get('add-tenant','TenantController@add_tenant');
Route::post('save-tenant','TenantController@save_tenant');
Route::get('edit-tenant/{id}','TenantController@edit_tenant');
Route::post('update-tenant/{id}','TenantController@update_tennat');
Route::get('delete-tenant/{id}','TenantController@delete_tenant');


//Houses routes
Route::get('all-houses','HouseController@all_houses');
Route::get('add-house','HouseController@add_house');
Route::post('save-house','HouseController@save_house');
Route::get('edit-house/{id}','HouseController@edit_house');
Route::post('update-house/{id}','HouseController@update_house');
Route::get('delete-house/{id}','HouseController@delete_house');

Route::get('active-house/{id}','HouseController@active_house');
Route::get('unactive-house/{id}','HouseController@unactive_house');

Route::get('all-occupied','HouseController@all_occupied_houses');
Route::get('all-vacant','HouseController@all_vacant_houses');
Route::get('assign-house','HouseController@assign_houses');
Route::post('save-tenant-house','HouseController@save_tenant_houses');

Route::get('find-unit-name','HouseController@find_unit_name');
Route::get('find-tenant','HouseController@find_tenant');


// invoice
 Route::get('all-invoices','InvoiceController@all_invoices');
 Route::get('add-invoice','InvoiceController@add_invoice');
 Route::get('edit-invoice','InvoiceController@edit_invoice');
 Route::get('view-invoice','InvoiceController@view_invoice');

});
