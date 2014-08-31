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

Route::get('catalog', 'CatalogController@showIndex');
Route::get('catalog/{category}', 'CatalogController@showCategory');

Route::get('servicing', function()
{
	return View::make('servicing');
});

Route::get('faq', function()
{
	return View::make('faq');
});

Route::get('locations-contact', 'ContactController@showIndex');
Route::post('locations-contact/send', 'ContactController@postContact');

Route::get('privacy-policy', function()
{
	return View::make('privacy-policy');
});

Route::get('admin', 'AdminController@showIndex');
Route::get('admin/login', 'AdminController@showLogin');
Route::post('admin/login', 'AdminController@postLogin');
Route::get('admin/logout', 'AdminController@destroy');
Route::get('admin/add/', 'AdminController@getCreate');
Route::post('admin/add/{type?}/post', 'AdminController@store');
Route::get('admin/edit/{type?}', 'AdminController@getShowEditIndex');
Route::get('admin/edit/product/{product-name}', 'AdminController@getShowEditProduct');