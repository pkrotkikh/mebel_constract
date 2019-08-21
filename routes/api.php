<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/kitchen/module/{id}/AJAX/params', 'Api\SiteController@moduleAJAXparams')->name('module.AJAX.params');
Route::post('/kitchen/module/{id}/AJAX/params/update', 'Api\SiteController@moduleAJAXparamsUpdate')->name('module.AJAX.params.update');

Route::delete('/kitchen/module/AJAX/height/{id}/delete', 'Api\SiteController@moduleHeightAJAXdelete')->name('module.height.AJAX.delete');
Route::delete('/kitchen/module/AJAX/width/{id}/delete', 'Api\SiteController@moduleWidthAJAXdelete')->name('module.width.AJAX.delete');

Route::prefix('site')->name('site.')->group(function(){
    Route::get('kitchens', 'Api\SiteController@index')->name('kitchens');
});
