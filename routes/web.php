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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::middleware(['auth'])->group(function() {
    // Route::group(['middleware' => ['auth', 'can:superAdmin']], function(){


    Route::get('employees', 'EmployeeController@index');
    Route::get('employee/create', 'EmployeeController@create');
    Route::post('employee/save', 'EmployeeController@save');
    // Route::put('employee/edit/{name}', 'EmployeeController@edit');
    // Route::post('employee/update/{name}', 'EmployeeController@update');
    // Route::delete('employee/delete/{name}', 'EmployeeController@delete');
        
    // Route::put('employee/edit/{first_name .last_name ._ .id}', 'EmployeeController@edit');
    
    Route::get('companies', 'CompanyController@index');
    Route::get('company/create', 'CompanyController@create');
    Route::post('company/save', 'CompanyController@save');
    // Route::put('company/edit/{name}', 'CompanyController@edit');
    // Route::post('company/update/{name}', 'CompanyController@update');
    // Route::delete('company/delete/{name}', 'CompanyController@delete');
});