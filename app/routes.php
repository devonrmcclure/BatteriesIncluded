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

Route::get('servicing', 'ServicingController@showIndex');
Route::get('servicing/shavers', 'ServicingController@showShavers');
Route::get('servicing/appliance-repair', 'ServicingController@showApplianceRepair');
Route::get('servicing/warranty', 'ServicingController@showWarranty');
Route::get('servicing/battery-changes', 'ServicingController@showBatteryChanges');

Route::get('faq', 'FAQController@showIndex');

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

Route::get('admin/add/', 'CreateCatalogItemController@showIndex');
Route::post('admin/add/category', 'CreateCatalogItemController@postCreateCategory');
Route::post('admin/add/subcategory', 'CreateCatalogItemController@postCreateSubcategory');
Route::post('admin/add/product', 'CreateCatalogItemController@postCreateProduct');

Route::get('admin/add/faqs', 'CreateFAQController@showIndex');
Route::post('admin/add/faqs', 'CreateFAQController@postAddFAQ');
Route::get('admin/edit/faqs', 'EditFAQController@showIndex');
Route::get('admin/edit/faqs/{id}', 'EditFAQController@getEditFAQ');
Route::put('admin/edit/faqs/{id}', 'EditFAQController@putEditFAQ');

Route::get('admin/delete/faqs/{id}', 'DeleteFAQController@getFAQ');
Route::delete('admin/delete/faqs/{id}', 'DeleteFAQController@deleteFAQ');

Route::get('admin/edit/categories', 'EditCategorySubcategoryController@showIndex');

Route::post('admin/edit/category', 'EditCategoryController@getEditCategory');
Route::put('admin/edit/category', 'EditCategoryController@putEditCategory');

Route::post('admin/edit/subcategory', 'EditSubcategoryController@getEditSubcategory');
Route::put('admin/edit/subcategory', 'EditSubcategoryController@putEditSubcategory');

Route::get('admin/edit/products', 'EditProductsController@showIndex');
Route::get('admin/edit/products/{category}', 'EditProductsController@showCategoryItems');
Route::get('admin/edit/product/{id}', 'EditProductsController@postEditProducts');
Route::put('admin/edit/product/{id}', 'EditProductsController@putEditProducts');

Route::get('admin/delete/product/{id}', 'DeleteProductsController@getProduct');
Route::delete('admin/delete/product/{id}', 'DeleteProductsController@deleteProduct');

Route::get('admin/password', 'AdminController@getUpdatePassword');
Route::put('admin/password', 'AdminController@putUpdatePassword');

Route::get('search', 'SearchController@getResults');

Route::get('404', function()
{
    return View::make('404');
});

// TODO: Create 404 page.
App::missing(function($exception)
{
    return Redirect::to($_ENV['URL'] . '/404');
});