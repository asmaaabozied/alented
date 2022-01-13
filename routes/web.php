<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clear', function () {
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('route:cache');
    dd('Done');
});

Route::get('/config-cache', function() {
    Artisan::call('config:cache');
    return "config is cleared";
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});


Auth::routes();

Route::middleware('auth:web')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/today_products', 'HomeController@today_products')->name('today_products');

    Route::post('/all_ads_pdf', 'HomeController@all_ads_pdf')->name('all_ads_pdf')->middleware('permission:All ADS');

    Route::resource('categories', 'CategoryController')->middleware('permission:Categories');

    Route::resource('regions', 'RegionController')->middleware('permission:Regions');

    Route::resource('informativeDatas', 'InformativeDataController')->middleware('permission:Informative Datas');

    Route::resource('sliders', 'SliderController')->middleware('permission:Slider');

    Route::resource('packages', 'PackagesController')->middleware('permission:Packages');

    Route::resource('clients', 'ClientController')->middleware('permission:Clients');

    Route::resource('news', 'NewsController')->middleware('permission:News');

    Route::resource('products', 'ProductController')->middleware('permission:Products');

    Route::resource('contentuses', 'ContentUsController')->middleware('permission:Contact Us');

    Route::resource('siteAds', 'SiteAdsController')->middleware('permission:Site Ads');

    Route::resource('permissions', 'PermissionController');

    Route::resource('roles', 'RoleController')->middleware('permission:Roles');

    Route::resource('admins', 'AdminController')->middleware('permission:Admins');

    Route::get('/Reportuser', 'ReportController@Reportuser')->name('Reportuser');

    Route::get('/Reportusers', 'ReportController@Reportusers')->name('Reportusers');

    Route::get('/Reportpackage', 'ReportController@Reportpackage')->name('Reportpackage');

    Route::get('/Reportproducts', 'ReportController@Reportproducts')->name('Reportproducts');

    Route::post('/productss/{id}', 'ReportController@statusproduct')->name('productss.status');

    Route::get('/showproductss/{id}', 'ReportController@showproductss')->name('showproductss');

    Route::get('/emailproductss', 'ReportController@emailproductss')->name('emailproductss');

    Route::delete('/emailproductss/{id}', 'ReportController@destory')->name('emailproductss.destroy');

});

