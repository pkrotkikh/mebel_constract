<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'SiteController@index')->name('front.home');

Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
    Route::resource('/dashboard', 'Admin\DashboardController');

    Route::post('/dashboard/{kitchen_id}/cupboard_update/', 'Admin\DashboardController@cupboardUpdate')->name('cupboard.update');
    Route::delete('/dashboard/kitchen/color/{id}/delete', 'Admin\DashboardController@deleteKitchenColor')->name('kitchen.color.delete');
    Route::delete('/dashboard/kitchen/additionType/{id}/delete', 'Admin\DashboardController@deleteKitchenAdditionType')->name('kitchen.additionType.delete');
    Route::delete('/dashboard/kitchen/addition/{id}/delete', 'Admin\DashboardController@deleteKitchenAddition')->name('kitchen.addition.delete');
    Route::delete('/dashboard/kitchen/module/type/{id}/delete', 'Admin\DashboardController@deleteKitchenModuleType')->name('kitchen.module.type.delete');
    Route::delete('/dashboard/kitchen/module/{id}/delete', 'Admin\DashboardController@deleteKitchenModule')->name('kitchen.module.delete');

    Route::resource('/colors', 'Admin\ColorController');
    Route::resource('/additions', 'Admin\AdditionController');
    Route::resource('/parameters', 'Admin\ParameterController');
    Route::resource('/items', 'Admin\ItemController');
    Route::resource('/param_items', 'Admin\ParamItemController');
    Route::resource('/param_kitchens', 'Admin\ParamKitchenController');
});