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

Route::get('/', 'EmployeeController@index');
Route::get('/employee/create', 'EmployeeController@create');
Route::post('/employee/create', 'EmployeeController@add');
Route::delete('/employee/delete/{employee}', 'EmployeeController@delete');
Route::get('/employee/update/{employee}', 'EmployeeController@update');
Route::patch('/employee/update/{employee}', 'EmployeeController@change');
Route::get('/employee/datadownload', 'EmployeeController@datadownload');
Route::get('/employee/export_excel', 'EmployeeController@excel');
Route::get('/employee/export_pdf', 'EmployeeController@pdf');
Route::get('/company', 'CompanyController@index');
Route::get('/company/create', 'CompanyController@create');
Route::post('/company/create', 'CompanyController@add');
Route::delete('/company/delete/{company}', 'CompanyController@delete');
Route::get('/company/update/{company}', 'CompanyController@update');
Route::patch('/company/update/{company}', 'CompanyController@change');