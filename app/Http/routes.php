<?php

Route::get('auth/login', 'Auth\AuthController@getIndex');
Route::post('auth/login', 'Auth\AuthController@postIndex');

Route::resource('/', 'DashboardController', [
]);

Route::resource('admin/users', 'AdminUsersController', [
]);