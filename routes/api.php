<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/clients/register', 'ClientAPIController@store');
Route::post('/clients/login', 'ClientAPIController@login');
Route::post('/clients/social_login', 'ClientAPIController@social_login');
Route::post('/clients/send_code', 'ClientAPIController@send_code');
Route::post('/clients/sendcode_onregister', 'ClientAPIController@sendcode_onregister');
Route::post('/clients/check_code', 'ClientAPIController@check_code');
Route::post('/clients/forget_password', 'ClientAPIController@forget_password');
Route::post('/client/add_newletter', 'ProductAPIController@add_newletter');
Route::post('/client/add_ad', 'ProductAPIController@store');
Route::get('/client/showdate', 'ProductAPIController@showdate');


Route::middleware('auth:api')->group(function () {
    Route::post('/clients/edit_profile', 'ClientAPIController@update');
    Route::post('/clients/logout', 'ClientAPIController@logout');
    Route::post('/clients/change_password', 'ClientAPIController@change_password');
    Route::get('/client', 'ClientAPIController@show');
    Route::post('/client/edit_ad/{id}', 'ProductAPIController@update');
    //Route::post('/client/add_ad', 'ProductAPIController@store');
    Route::post('/client/delete_productimage', 'ProductAPIController@delete_productimage');

    Route::post('/client/delete_ad/{id}', 'ProductAPIController@destroy');
    Route::post('/client/ads/{owner}', 'ProductAPIController@index');
    Route::post('/client/ads/{owner}/{period}', 'ProductAPIController@index');
    Route::post('/packages/subscribe', 'PackagesAPIController@subscribe');
    Route::post('live_token_order', 'PackagesAPIController@live_token_order');
    Route::get('get_order_status', 'PackagesAPIController@get_order_status');
});

Route::get('/categories', 'CategoryAPIController@index');
Route::get('/categories/{all}', 'CategoryAPIController@index');

Route::resource('regions', 'RegionAPIController');

Route::get('/informative/{data}', 'InformativeDataAPIController@index');

Route::get('/all_pdf', 'InformativeDataAPIController@all_pdf');

Route::get('/update_viewcount', 'InformativeDataAPIController@update_viewcount');
Route::get('/update_downloadcount', 'InformativeDataAPIController@update_downloadcount');

Route::resource('sliders', 'SliderAPIController');

Route::resource('packages', 'PackagesAPIController');

Route::resource('news', 'NewsAPIController');

Route::get('news_groupbyoption', 'NewsAPIController@news_groupbyoption');

Route::post('ads', 'ProductAPIController@index');

Route::get('ad/{id}', 'ProductAPIController@show');

Route::resource('contactuses', 'ContentUsAPIController');

Route::resource('site_ads', 'SiteAdsAPIController');

Route::get('/views', 'InformativeDataAPIController@views');
