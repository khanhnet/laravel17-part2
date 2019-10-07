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

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin'
], function (){
    // Trang dashboard - trang chủ admin
    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
    // Quản lý sản phẩm
    Route::group(['prefix' => 'products'], function(){
       Route::get('/', 'ProductController@index')->name('admin.product.index');
       Route::get('/create', 'ProductController@create')->name('admin.product.create');
    });
    // Quản lý danh muc
    Route::group(['prefix' => 'categories'], function(){
       Route::get('/', 'CategoryController@index')->name('admin.category.index');
       Route::get('/create', 'CategoryController@create')->name('admin.category.create');
    });
    //Quản lý người dùng
    Route::group(['prefix' => 'admin'], function(){
        Route::get('/', 'AdminController@index')->name('admin.user.index');
        Route::get('/create', 'AdminController@create')->name('admin.user.create');
    });
});