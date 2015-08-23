<?php


Route::get('auth/login', ['as' => 'login','uses'=>'Auth\AuthController@getIndex']);
Route::post('auth/login', ['as' => 'login','uses'=>'Auth\AuthController@postIndex']);




Route::group(['domain' => 'app-kyokai-accsys.com'], function () {
    Route::resource('admin/users', 'AdminUsersController', [
    ]);
    Route::resource('/', 'DashboardController', [
    ]);
});

