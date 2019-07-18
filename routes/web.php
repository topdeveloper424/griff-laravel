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
//-------------------user controller ------------------------------
Route::get('/',"UserController@landing_page");
Route::post('/register',"UserController@register");
Route::post('/login',"UserController@login");
Route::get('/login',"UserController@loginPage")->name('login');
Route::get('/register',"UserController@registerPage")->name('register');
Route::get('/dashboard',"UserController@dashboard")->name('dashboard');

//---------------------------Business Controller ---------------------------------
Route::get('/profile',"BusinessController@profile");
Route::get('/signOut',"BusinessController@signOut")->name('signout');

Route::get('/add-property',"BusinessController@addPropertyPage")->name('add-property');
Route::post('/create-property',"BusinessController@createProperty");
Route::post('/update-property',"BusinessController@updateProperty");


Route::get('/properties',"BusinessController@propertyPage")->name('properties');
Route::get('/property-detail',"BusinessController@propertyDetail");
Route::get('/property-remove',"BusinessController@propertyRemove");
Route::get('/property-edit',"BusinessController@propertyEdit");

Route::get('/search',"BusinessController@search");
Route::post('/search-result',"BusinessController@searchResult");

Route::get('/house-detail',"BusinessController@houseDetail");

Route::post('/add-cart',"BusinessController@addCart");
Route::post('/remove-cart',"BusinessController@removeCart");
Route::get('/watch-list',"BusinessController@watchListPage")->name('watchListPage');

//----------------------------------property controller -----------------------------------

Route::get('/b-properties',"PropertyController@propertyPage")->name('b-properties');
Route::get('/add-b-property',"PropertyController@addPropertyPage")->name('add-b-property');
Route::post('/create-b-property',"PropertyController@createProperty");
Route::get('/view-b-property',"PropertyController@viewPropertyPage")->name('view-b-property');
Route::get('/remove-b-property',"PropertyController@removePropertyPage");
Route::get('/edit-b-property',"PropertyController@editPropertyPage")->name('edit-b-property');
Route::post('/update-b-property',"PropertyController@updatePropertyPage");

Route::get('/b-units',"PropertyController@unitPage")->name('b-units');
Route::get('/edit-b-unit',"PropertyController@editUnitPage")->name('edit-b-unit');
Route::get('/remove-b-unit',"PropertyController@removeUnit");
Route::post('/update-m-unit',"PropertyController@updateMultiUnit");
Route::post('/update-s-unit',"PropertyController@updateSingleUnit");

//--------------------------------------Manage Conroller-----------------------------------
Route::get('/settings',"ManageController@settingsPage")->name('settings');
Route::post('/change-personal',"ManageController@changePersonal");
Route::post('/change-password',"ManageController@changePassword");

Route::get('/about-us',"ManageController@aboutusPage")->name('about-us');
Route::get('/contact-us',"ManageController@contactusPage")->name('contact-us');
