<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});

Route::get('/catalog', 'CatalogController@showIndex');
Route::get('/catalog/{category}', 'CatalogController@showCategory');
Route::get('/catalog/product/{id}', 'CatalogController@showSingleProduct');

Route::get('/servicing', 'ServicingController@showIndex');
//Route::get('servicing/{subject}', 'ServicingController@showSubject');
Route::get('/servicing/shavers', 'ServicingController@showShavers');
Route::get('/servicing/appliance-repair', 'ServicingController@showApplianceRepair');
Route::get('/servicing/warranty', 'ServicingController@showWarranty');
Route::get('/servicing/battery-changes', 'ServicingController@showBatteryChanges');

Route::get('/faq', 'FAQController@showIndex');

Route::get('/locations-contact', 'ContactController@showIndex');
//Route::post('/locations-contact/send', 'ContactController@postContact');

Route::get('/privacy-policy', function()
{
	return View::make('privacy-policy');
});

Route::get('/admin', 'AdminController@showIndex');
Route::get('/admin/login', 'AdminController@showLogin');
Route::post('/admin/login', 'AdminController@postLogin');
Route::get('/admin/logout', 'AdminController@destroy');


Route::get('/admin/manage', 'AdminController@manageIndex');
Route::get('/admin/products', 'AdminController@productIndex');
Route::get('/admin/products/edit/{id}', 'AdminController@productEdit');
Route::get('/admin/settings', 'AdminController@settingsIndex');
Route::get('/admin/settings/password', 'AdminController@getUpdatePassword');
Route::put('/admin/settings/password', 'AdminController@putUpdatePassword');

Route::get('/search', 'SearchController@getResults');

Route::get('/404', function()
{
    return View::make('404');
});

// TODO: Create 404 page.
App::missing(function($exception)
{
    return Redirect::to($_ENV['URL'] . '/404');
});