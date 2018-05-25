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

Route::get('/', function () {
    return view('start');
});

Route::get('/view1', 'AfController@view1');
Route::get('/view2', 'AfController@view2');
Route::get('/view3', 'AfController@view3');

Route::apiResource('employees', 'EmployeeController');
Route::apiResource('companies', 'CompanyController');
Route::apiResource('company-employees', 'CompanyEmployeesController');
