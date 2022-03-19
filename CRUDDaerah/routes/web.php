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

Route::get('/', 'ProvinceController@index');
Route::get('/province/create', 'ProvinceController@create');
Route::post('/province/create', 'ProvinceController@add');
Route::get('/province/update/{province}', 'ProvinceController@update');
Route::post('/province/update/{province}', 'ProvinceController@change');
Route::delete('/province/delete/{province}', 'ProvinceController@delete');

Route::get('/city', 'CityController@index');
Route::get('/city/create', 'CityController@create');
Route::post('/city/create', 'CityController@add');
Route::get('/city/update/{city}', 'CityController@update');
Route::post('/city/update/{city}', 'CityController@change');
Route::delete('/city/delete/{city}', 'CityController@delete');

Route::get('/district', 'DistrictController@index');
Route::get('/district/create', 'DistrictController@create');
Route::post('/district/create', 'DistrictController@add');
Route::get('/district/update/{district}', 'DistrictController@update');
Route::post('/district/update/{district}', 'DistrictController@change');
Route::delete('/district/delete/{district}', 'DistrictController@delete');

Route::get('/vilage', 'VilageController@index');
Route::get('/vilage/create', 'VilageController@create');
Route::post('/vilage/create', 'VilageController@add');
Route::get('/vilage/update/{vilage}', 'VilageController@update');
Route::post('/vilage/update/{vilage}', 'VilageController@change');
Route::delete('/vilage/delete/{vilage}', 'VilageController@delete');