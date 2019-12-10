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

Route::get('/product/add','ProductController@add');


Route::get('main/employee','EmployeeController@showEmployees');
Route::get('main/addemployee', function () {
    return view('employees.addemployee');
});
Route::get('employee/add/check','EmployeeController@addEmployee');
Route::get('main/employee/fire','EmployeeController@fireEmployee');

Route::get('/productlist/view','ViewController@index');
Route::get('/productlist/filter','ProductController@filter'); // Filter

Route::get('/keyOrder','OrderController@keyOrder');
Route::get('/keyOrder/check','OrderController@check');
Route::get('/keyOrder/orderDetail','OrderController@orderDetail');
Route::get('/keyOrder/orderDetail/check','OrderController@checkDetail');

Route::get('/orderlist','OrderController@index');
Route::get('/orderlist/updateOrder','OrderController@updateOrder');
Route::get('/orderlist/detail','OrderController@detail');

Route::get('/promotion','promotionController@index');
Route::get('/promotion/update','promotionController@update');
Route::get('/promotion/checkDiscount','promotionController@checkDiscount');
Route::get('/promotion/checkBuy1Get1','promotionController@checkBuy1Get1');

Route::get('main/customer','CustomerController@index');
Route::get('main/customer/view','CustomerController@detail');
Route::get('main/customer/add','CustomerController@add');
Route::get('main/customer/add/check','CustomerController@addcheck');

Route::get('/payment','paymentController@index');
Route::get('/payment/paymentDetail','paymentController@paymentDetail');
Route::get('/payment/paymentDetail/check','paymentController@check');
