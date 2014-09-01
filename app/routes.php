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
Route::post('admin/add/{type?}', 'AdminController@store');
Route::get('admin/edit/categories', 'AdminController@getEditCategoriesIndex');
Route::post('admin/edit/category', 'AdminController@getEditCategory');
Route::put('admin/edit/category', 'AdminController@putEditCategory');
Route::post('admin/edit/subcategory', 'AdminController@getEditSubcategory');
Route::put('admin/edit/subcategory', 'AdminController@putEditSubcategory');
Route::get('admin/edit/products', 'AdminController@getEditProducts');
Route::get('admin/edit/product/{id}', 'AdminController@postEditProducts');
Route::put('admin/edit/product/{id}', 'AdminController@putEditProducts');
Route::get('admin/delete/product/{id}', 'AdminController@getDeleteProducts');
Route::delete('admin/delete/product/{id}', 'AdminController@delDeleteProducts');