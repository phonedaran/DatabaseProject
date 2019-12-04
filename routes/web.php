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
//Route::get('/main/success','ProductController@pdlogin');
Route::get('main/logout','MainController@logout');
Route::get('/productlist/view','ViewController@index');
Route::get('/productlist/filter','ProductController@filter'); // Filter
Route::get('/keyOrder','OrderController@keyOrder');
Route::get('/keyOrder/check','OrderController@check');
Route::get('/keyOrder/orderDetail','OrderController@orderDetail');
Route::get('/keyOrder/orderDetail/check','OrderController@checkDetail');
Route::get('/orderlist','OrderController@index');
