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

        Route::group(['prefix'=>'profile'],function (){
            Route::get('edit','profileController@editProfile')->name('admin.edit.profile');
            Route::post('update','profileController@updateProfile')->name('admin.update.profile');
        });

        //    ######################### start main_categories ###################################
        Route::group(['prefix'=>'main_categories'],function (){
            Route::get('/','mainCategoriesController@index')->name('admin.mainCategories');
            Route::get('create','mainCategoriesController@create')->name('admin.add.mainCategory');
            Route::post('store','mainCategoriesController@store')->name('admin.store.mainCategory');
            Route::get('edit/{id}','mainCategoriesController@edit')->name('admin.edit.mainCategory');
            Route::post('update/{id}','mainCategoriesController@update')->name('admin.update.mainCategory');
            Route::get('delete/{id}','mainCategoriesController@destroy')->name('admin.delete.mainCategory');
        });
        //    ######################### end categories ###################################
        //    ######################### start sub_categories ###################################
        Route::group(['prefix'=>'sub_categories'],function (){
            Route::get('/','subCategoriesController@index')->name('admin.subCategories');
            Route::get('create','subCategoriesController@create')->name('admin.add.subCategories');
            Route::post('store','subCategoriesController@store')->name('admin.store.subCategories');
            Route::get('edit/{id}','subCategoriesController@edit')->name('admin.edit.subCategories');
            Route::post('update/{id}','subCategoriesController@update')->name('admin.update.subCategories');
            Route::get('delete/{id}','subCategoriesController@destroy')->name('admin.delete.subCategories');
        });
        //    ######################### end categories ###################################
        //    ######################### start brands ###################################
        Route::group(['prefix'=>'brands'],function (){
            Route::get('/','brandController@index')->name('admin.brands');
            Route::get('create','brandController@create')->name('admin.add.brands');
            Route::post('store','brandController@store')->name('admin.store.brands');
            Route::get('edit/{id}','brandController@edit')->name('admin.edit.brands');
            Route::post('update/{id}','brandController@update')->name('admin.update.brands');
            Route::get('delete/{id}','brandController@destroy')->name('admin.delete.brands');
        });
        //    ######################### end categories ###################################

    });


//    ######################### admin guest ###################################
    Route::group(['namespace'=>'Admin','middleware'=>'guest:admin','prefix'=>'admin'],function (){
        Route::get('/login','loginController@login') -> name('admin.login');
        Route::post('/doLogin','loginController@doLogin') -> name('doLogin');

    });

});







