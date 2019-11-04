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

// Route::get('/home', 'HomeController@index')->name('home');

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
    Route::get('/profile', 'AdminController@show')->name('profile');
    Route::get('/getdata', 'AdminController@getData')->name('getdata');
    Route::get('/getdetail/{id}', 'AdminController@getDetail')->name('getdetail');
    Route::post('/update/{id}', 'AdminController@update')->name('update');
    Route::put('/delete/{id}', 'AdminController@destroy')->name('destroy');
  });
  //Quản lý người dùng
  Route::group(['prefix' => 'options','as'=>'options.'], function(){
    Route::get('/', 'OptionController@index')->name('index');
    Route::post('/', 'OptionController@store')->name('store');
    Route::get('/getdata', 'OptionController@getData')->name('getdata');
    Route::get('/getdetail/{id}', 'OptionController@getDetail')->name('getdetail');
    Route::post('/update/{id}', 'OptionController@update')->name('update');
    Route::put('/delete/{id}', 'OptionController@destroy')->name('destroy');
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