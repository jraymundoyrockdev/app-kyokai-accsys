<?php


Route::resource('/', 'DashboardController', [
]);

Route::get('auth/login', 'Auth\AuthController@getIndex');
Route::post('auth/login', 'Auth\AuthController@postIndex');
