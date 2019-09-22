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

// Route::resource('companies', 'CompanyController');

// Route::middleware(['Auth', 'auth'])->group(function () {
Route::middleware('auth')->group(function () {
//     Route::get('/employee', 'EmployeeController@index');
//     Route::post('/create_employee', 'EmployeeController@create');
//     Route::put('/edit_employee_details', 'EmployeeController@edit');
//     Route::put('/delete_employee', 'EmployeeController@delete');
//     Route::get('/employee_details', 'EmployeeController@detail');

//     // Route::get('/', function () {
//     //     // Uses first & second Middleware
//     // });
    
    Route::get('companies', 'CompanyController@index');
    Route::get('company/create', 'CompanyController@create');
    Route::post('company/save', 'CompanyController@save');
    Route::get('company/edit/{name}', 'CompanyController@edit');
    Route::post('company/update/{name}', 'CompanyController@update');
    Route::post('company/delete/{name}', 'CompanyController@delete');
});