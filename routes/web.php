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

Route::get('/login', function () {
    return view('login');
});

Route::get('/productlist', function () {
    return view('Productlist');
});

Route::get('/','ProductController@index');
Route::get('/main','MainController@index');
Route::post('/main/success','MainController@login');
Route::get('main/success','ProductController@pdlogin');
Route::get('main/logout','MainController@logout');
Route::get('main/employee','EmployeeController@showEmployees');

Route::get('main/addemployee', function () {
    return view('employees.addemployee');
});

Route::get('employee/add/check','EmployeeController@addEmployee');
Route::get('/productlist/view','ViewController@index');
Route::get('/productlist/filter','ProductController@filter'); // Filter
