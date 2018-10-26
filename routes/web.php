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

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
//Example for Permission
Route::get('/routelist','Auth\RouteListController@routeList');


Route::group(['middleware'=>'auth'],function (){

    Route::get('/', function(){return view('dashboard');})->name('dashboard');

    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');

    //Permissions
    Route::resource('hotel_permissions','Auth\HotelPermissionController');
    Route::resource('permissions','Auth\PermissionController');

    //Room Master
    Route::get('roomtype/tariffs','RoomTypeController@getRoomTypePrices');
    Route::resource('roomtypes','RoomTypeController');
    Route::resource('roomstatus','RoomStatusController');
    Route::resource('tariffs','TariffController');

    //Ledger Master
    Route::get('ledgers/getDataTable','LedgerController@getDataTable');
    Route::resource('ledgers','LedgerController');
    Route::get('ledgergroups/getDataTable','LedgerGroupController@getDataTable');
    Route::resource('ledgergroups','LedgerGroupController');
    Route::get('designations/getDataTable','DesignationController@getDataTable');
    Route::resource('designations','DesignationController');

    //Settings
    Route::post('taxes/getTaxSlab','TaxesController@getTaxSlab');
    Route::get('taxes/getDataTable','TaxesController@getDataTable');
    Route::resource('taxes','TaxesController');


    //Housekeeping
    Route::get('housekeepers/getDataTable','HouseKeepersController@getDataTable');
    Route::resource('housekeepers','HouseKeepersController');
    Route::get('hkstatus/getDataTable','HousekeepingStatusController@getDataTable');
    Route::resource('hkstatus','HousekeepingStatusController');

    //System/General Master
    Route::get('purpose/getDataTable','PurposeController@getDataTable');
    Route::resource('purpose','PurposeController');
    Route::get('function/getDataTable','FunctionmasterController@getDataTable');
    Route::resource('function','FunctionmasterController');
    Route::get('reason/getDataTable','ReasonController@getDataTable');
    Route::resource('reason','ReasonController');
    Route::get('note/getDataTable','NoteController@getDataTable');
    Route::resource('note','NoteController');
    Route::get('instruction/getDataTable','InstructionController@getDataTable');
    Route::resource('instruction','InstructionController');

    //Masters
    Route::get('identity/getDataTable','IdentityController@getDataTable');
    Route::resource('identity','IdentityController');
    Route::get('transmode/getDataTable','TransportationController@getDataTable');
    Route::resource('transmode','TransportationController');
    Route::get('discount/getDataTable','DiscountController@getDataTable');
    Route::resource('discount','DiscountController');
    Route::get('amenity/getDataTable','AmenityController@getDataTable');
    Route::resource('amenity','AmenityController');
    
});
