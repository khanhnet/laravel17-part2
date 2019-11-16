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

Route::get('/404', function () {
  return view('admin.404');
})->name('404');

Auth::routes();

Route::post('reset-password', 'EmailController@sendMail');
Route::put('reset-password/{token}', 'EmailController@reset');

Route::group([
  'namespace' => 'Admin',
  'prefix' => 'admin'
], function (){
    // Trang dashboard - trang chủ admin
  Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
    // Quản lý sản phẩm
  Route::group(['prefix' => 'products','as'=>'products.'], function(){
    Route::get('/', 'ProductController@index')->name('index');
    Route::post('/', 'ProductController@store')->name('store');
    Route::get('/getdata', 'ProductController@getData')->name('getdata');
    Route::get('/getdetail/{id}', 'ProductController@getDetail')->name('getdetail');
    Route::post('/update/{id}', 'ProductController@update')->name('update');
    Route::put('/delete/{id}', 'ProductController@destroy')->name('destroy');
  });
    // Quản lý danh muc
  Route::group(['prefix' => 'categories','as'=>'categories.'], function(){
   Route::get('/', 'CategoryController@index')->name('index');
   Route::post('/', 'CategoryController@store')->name('store');
   Route::get('/getdata', 'CategoryController@getData')->name('getdata');
   Route::get('/getdetail/{id}', 'CategoryController@getDetail')->name('getdetail');
   Route::post('/update/{id}', 'CategoryController@update')->name('update');
   Route::put('/delete/{id}', 'CategoryController@destroy')->name('destroy');
 });
    //Quản lý người dùng
  Route::group(['prefix' => 'admin','as'=>'admin.'], function(){
    Route::get('/', 'AdminController@index')->name('index');
    Route::post('/', 'AdminController@store')->name('store');
    Route::get('/profile', 'AdminController@profile')->name('profile');
    Route::get('/getdata', 'AdminController@getData')->name('getdata');
    Route::get('/getdetail/{id}', 'AdminController@getDetail')->name('getdetail');
    Route::post('/update', 'AdminController@update')->name('update');
    Route::post('/change-password', 'AdminController@changePassword')->name('changepassword');
    Route::put('/delete/{id}', 'AdminController@destroy')->name('destroy');
    Route::get('/logout', 'AdminController@logout')->name('logout');
  });
  //Quản lý người dùng
  Route::group(['prefix' => 'options','as'=>'options.'], function(){
    Route::get('/', 'OptionController@index')->name('index');
    Route::post('/', 'OptionController@store')->name('store');
    Route::get('/getdata', 'OptionController@getData')->name('getdata');
    Route::get('/get-option-category/{category_id}', 'OptionController@getOptionCategory')->name('getoptioncategory');
    Route::get('/getdetail/{id}', 'OptionController@getDetail')->name('getdetail');
    Route::post('/update/{id}', 'OptionController@update')->name('update');
    Route::put('/delete/{id}', 'OptionController@destroy')->name('destroy');
  });
  //Quản lý hóa đơn
  Route::group(['prefix' => 'bills','as'=>'bills.'], function(){
    Route::get('/', 'BillController@index')->name('index');
    Route::get('/getdata', 'BillController@getData')->name('getdata');
    Route::get('/getdetail/{id}', 'BillController@getDetail')->name('getdetail');
    Route::post('/confirm', 'BillController@confirmBill')->name('confirmBill');
  });
});


Route::get('/', 'HomeController@index')->name('home');

Route::get('/category/{slug}', 'HomeController@getProductsCategory')->name('getProductsCategory');
Route::get('/product/{slug}', 'HomeController@getProduct')->name('getProduct');
Route::get('/checkout', 'HomeController@getCheckout')->name('getcheckout');
Route::post('/checkout', 'HomeController@postCheckout')->name('postcheckout');

Route::get('/add/{code}/{name}/{amount}/{price}', 'HomeController@addToCart')->name('addtocart');
Route::get('/del/{rowId}', 'HomeController@delToCart')->name('deltocart');

Route::get('/user-login', 'CustomerController@getLogin')->name('getLoginCustomer');
Route::post('/user-login', 'CustomerController@postLogin')->name('postLoginCustomer');
Route::post('/user-create', 'CustomerController@store')->name('postCreateCustomer');
Route::post('/user-forgot', 'CustomerController@forgot')->name('postForgotCustomer');
Route::get('/user-forgot', 'CustomerController@getForgot')->name('getForgotCustomer');
Route::post('/user-change-password', 'CustomerController@changePassword')->name('changepassword');
Route::get('/user-logout', 'CustomerController@logout')->name('logout');

Route::post('/profile', 'CustomerController@profile')->name('profile');
Route::post('/confirm', 'Admin\BillController@confirm')->name('confirm');
