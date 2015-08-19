<?php

Route::get('auth/login', ['as' => 'login','uses'=>'Auth\AuthController@getIndex']);

Route::post('auth/login', 'Auth\AuthController@postIndex');


Route::resource('/', 'DashboardController', [
]);

Route::group(['domain' => 'app-kyokai-accsys.com'], function () {
    Route::resource('admin/users', 'AdminUsersController', [
    ]);
});

