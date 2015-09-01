<?php


Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getIndex']);
Route::post('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@postIndex']);


Route::group([ 'middleware' => 'validate_token'], function () {
    Route::resource('admin/users', 'AdminUsersController', [
    ]);
    Route::resource('admin/user-roles', 'AdminUserRolesController', [
    ]);
    Route::resource('admin/ministry', 'AdminMinistryController', [
    ]);
    Route::resource('/', 'DashboardController', [
    ]);
    Route::resource('service', 'ServiceController', [
    ]);
});

