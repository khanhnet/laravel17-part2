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
  return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::group([
  'namespace' => 'Admin',
  'prefix' => 'admin'
], function (){
    // Trang dashboard - trang chủ admin
  Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
    // Quản lý sản phẩm
  Route::group(['prefix' => 'products','as'=>'products.'], function(){
    Route::resource('/', 'ProductController');
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
    Route::resource('/', 'AdminController');
    Route::get('/getdata', 'CategoryController@getData')->name('getdata');
    Route::get('/getdetail/{id}', 'CategoryController@getDetail')->name('getdetail');
    Route::post('/update/{id}', 'CategoryController@update')->name('update');
    Route::put('/delete/{id}', 'CategoryController@destroy')->name('destroy');
  });
});

 // Route::get('lay', function (){
 //    return view('user.index');
 // })->name('admin.user.index');

 // Route::get('pro', function (){
 //    return view('user.product');
 // })->name('admin.user.index');

// Route::group([
//     'namespace' => 'User',
// ], function (){
//     // Trang dashboard - trang chủ admin
//     Route::get('/dashboard', 'DashboardController@index')->name('user.dashboard');
//     // Quản lý sản phẩm
//     Route::group(['prefix' => 'products'], function(){
//        Route::get('/', 'ProductController@index')->name('user.product.index');
//     });
//     // Quản lý danh muc
//     Route::group(['prefix' => 'categories'], function(){
//        Route::get('/', 'CategoryController@index')->name('user.category.index');
//     });
//     //Quản lý người dùng
//     Route::group(['prefix' => 'admin'], function(){
//         Route::get('/', 'AdminController@index')->name('admin.user.index');
//         Route::get('/create', 'AdminController@create')->name('admin.user.create');
//     });
// });