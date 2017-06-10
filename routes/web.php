<?php

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

//URLs to Index
Route::get('/',      'HomeController@index');
Route::get('/home',  'HomeController@index');
Route::get('/index', 'HomeController@index');

//Home Links
Route::get('/list/sales',   'ListController@listSales');
Route::get('/list/sellers', 'ListController@listSellers');
Route::get('/sale',         'SaleController@sale');

//json
Route::get('/sale/calc-commission/{price}', 'SaleController@calculateCommission');

//crud
Route::post('/sale/create',        'SaleController@save');
Route::post('/sale/update/{id}',   'SaleController@save');
Route::get ('/update/{type}/{id}', 'SaleController@update');
Route::get ('/delete/{type}/{id}', 'ListController@delete');

//details
Route::get ('/details/{id}', 'DetailsController@load');
