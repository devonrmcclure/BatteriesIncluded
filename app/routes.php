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

Route::get('catalog', 'CatalogController@index');

Route::get('servicing', function()
{
	return View::make('servicing');
});

Route::get('faq', function()
{
	return View::make('faq');
});

Route::get('locations-contact', function()
{
	return View::make('locations-contact');
});

Route::get('privacy-policy', function()
{
	return View::make('privacy-policy');
});

Route::resource('admin', 'AdminController');