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

Route::get('hello', function()
{
  return View::make('hello');
});
Route::get('/', function()
{
	return View::make('api');
});
Route::group(['after' => 'prettify'], function() {
  Route::resource('categories', 'CategoriesController', ['except' => 'create', 'edit']);
  Route::resource('orders', 'OrdersController', ['except' => 'create', 'edit']);
  Route::resource('products', 'ProductsController', ['except' => 'create', 'edit']);
  Route::resource('sections', 'SectionController', ['except' => 'create', 'edit']);
});