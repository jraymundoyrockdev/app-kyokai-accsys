<?php


Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getIndex']);
Route::post('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@postIndex']);


Route::group(['domain' => 'app-kyokai-accsys.com', 'middleware' => 'token_session_validator'], function () {
    Route::resource('admin/users', 'AdminUsersController', [
    ]);
    Route::resource('/', 'DashboardController', [
    ]);
});

