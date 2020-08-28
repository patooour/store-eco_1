<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

//        ######################### admin auth ###################################
    Route::group(['namespace'=>'Admin','middleware'=>'auth:admin' , 'prefix'=>'admin'], function (){
        Route::get('/','dashboardController@index')->name('admin.dashboard');
        Route::get('logout','loginController@logout')->name('admin.logout');

        Route::group(['prefix'=>'settings'],function (){
            Route::get('shipping-method/{type}','settingController@editShipping')->name('edit.shipping.method');
            Route::post('shipping-method/{id}','settingController@updateShipping')->name('update.shipping.method');
        });

    });


//    ######################### admin guest ###################################
    Route::group(['namespace'=>'Admin','middleware'=>'guest:admin','prefix'=>'admin'],function (){
        Route::get('/login','loginController@login') -> name('admin.login');
        Route::post('/doLogin','loginController@doLogin') -> name('doLogin');

    });

});







