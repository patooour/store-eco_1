<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::group(['namespace'=>'Admin','middleware'=>'auth:admin'], function (){
    Route::get('/','dashboardController@index')->name('admin.dashboard');

});

Route::group(['namespace'=>'Admin','middleware'=>'guest:admin'],function (){
    Route::get('/login','loginController@login') -> name('admin.login');
    Route::post('/doLogin','loginController@doLogin') -> name('doLogin');

});


