<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('logout', 'Auth\Api\LoginController@logout')->name('api.logout');
});

Route::post('login', 'Auth\Api\LoginController@login')->name('api.login');
Route::get('login/exist_email/{email}', 'Auth\Api\LoginController@existEmail')->name('api.login.exist_email');
