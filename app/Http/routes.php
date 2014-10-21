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

get('/', 'ProductsController@index');

get('view/{category}', ['as' => 'category.view', 'uses' => 'ProductsController@category']);

$router->resource('products', 'ProductsController');