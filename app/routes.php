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

Route::get('/catalog', 'CatalogController@showIndex');
Route::get('/catalog/{slug}', 'CatalogController@showCategory');
Route::get('/catalog/product/{slug}', 'CatalogController@showSingleProduct');

Route::get('/servicing', 'ServicingController@showIndex');
//Route::get('servicing/{subject}', 'ServicingController@showSubject');


Route::get('/admin', 'AdminController@showIndex');
Route::get('/admin/login', 'AdminController@showLogin');
Route::post('/admin/login', 'AdminController@postLogin');
Route::get('/admin/logout', 'AdminController@destroy');

Route::get('/', 'HomeController@show');
Route::resource('/admin/home', 'HomeController', array('except' => array('show')));
Route::resource('/admin/carousels', 'CarouselController', array('except' => array('show')));

Route::get('/services', 'ServicesController@show');
Route::resource('/admin/services', 'ServicesController', array('except' => array('show')));

Route::resource('/admin/products', 'ProductsController', array('except' => array('show')));
Route::resource('/admin/categories', 'CategoriesController', array('except' => array('show', 'destroy')));
Route::get('/faq', 'FAQController@show');
Route::resource('admin/faqs', 'FAQController', array('except' => array('show')));
Route::get('/locations', 'LocationsController@show');
Route::resource('admin/locations', 'LocationsController', array('except' => array('show')));

Route::resource('admin/roles', 'RolesController');

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
    return Redirect::to('/404');
});