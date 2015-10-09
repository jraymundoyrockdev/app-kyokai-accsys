<?php


Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getIndex']);
Route::post('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@postIndex']);
Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);


Route::group(['middleware' => 'validate_token'], function () {

    Route::group(['prefix' => 'admin'], function () {
        Route::resource('users', 'AdminUsersController');
        Route::resource('roles', 'AdminRolesController');
        Route::resource('ministry', 'AdminMinistryController');
        Route::resource('denominations', 'AdminDenominationsController');
        Route::resource('services', 'AdminServicesController');
        Route::resource('members', 'AdminMembersController');
    });

    Route::resource('/', 'DashboardController');
    Route::resource('service', 'ServiceController');
});

