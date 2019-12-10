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

Route::get('/','ProductController@index');      //main(public)
Route::get('/main','MainController@index');     //login

Route::post('/main/success','MainController@login');    //main(login)
Route::get('main/logout','MainController@logout');      //main(public)

Route::get('/product/add','ProductController@add');     //addproduct

//Employee
Route::get('main/employee','EmployeeController@showEmployees');     //ok
Route::get('main/addemployee', function () {
    session_start();
    $jobTitle = $_SESSION['job'];
    return view('employees.addemployee',['jobTitle' => $jobTitle]);
});
Route::get('employee/add/check','EmployeeController@addEmployee');
Route::get('main/employee/fire','EmployeeController@fireEmployee');

//Product
Route::get('/productlist/view','ViewController@index');         //public
Route::get('/productlist/filter','ProductController@filter');       //public

//Order
Route::get('/keyOrder','OrderController@keyOrder');
Route::get('/keyOrder/check','OrderController@check');
Route::get('/keyOrder/orderDetail','OrderController@orderDetail');
Route::get('/keyOrder/orderDetail/check','OrderController@checkDetail');
Route::get('/orderlist','OrderController@index');
Route::get('/orderlist/updateOrder','OrderController@updateOrder');
Route::get('/orderlist/detail','OrderController@detail');

//Promotion
Route::get('/promotion','promotionController@index');
Route::get('/promotion/update','promotionController@update');
Route::get('/promotion/checkDiscount','promotionController@checkDiscount');
Route::get('/promotion/checkBuy1Get1','promotionController@checkBuy1Get1');

//Customer
Route::get('main/customer','CustomerController@index');           //ok
Route::get('main/customer/view','CustomerController@detail');       //ok
Route::get('main/customer/add','CustomerController@add');           //ok
Route::get('main/customer/add/check','CustomerController@addcheck');        //ok

//Payment
Route::get('/payment','paymentController@index');
Route::get('/payment/paymentDetail','paymentController@paymentDetail');
Route::get('/payment/paymentDetail/check','paymentController@check');
