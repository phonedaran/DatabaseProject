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
Route::post('/main/checklogin','MainController@checklogin');
Route::get('main/successlogin','MainController@successlogin');
Route::get('main/logout','MainController@logout');