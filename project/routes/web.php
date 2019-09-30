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
Route::get('/hello', function () {
    return '<h1 style="color: green;">hello</h1>';
});

// Route::get('/form', function () {
//     return view('form');
// });

Route::view('/form', 'form');

Route::post('/form', function () {
    echo '<h1 style="color: green;">ok</h1>';
})->name('form');

Route::redirect('/here', 'form');

Route::get('user/{id}/{name}', function($id,$name) {

    return 'User ' . $id.' and name '.$name;
})->name('user');

Route::get('/user/{id}/post/{post}', function($id, $idPost) {
    return "This is post $idPost of user $id"; 
});

Route::get('user/{id?}', function($id = null) {
    if ($id == null) {
        return 'List users';
    }
    
    return "User $id";
});

Route::get('post/{id}/comment/{comment?}', function($id, $idComment=null) {
    return "Post $id with comment $idComment";
});

Route::prefix('admin')->group(function(){
	Route::prefix('user')->group(function(){

       Route::get('hello', function () {
        echo '<h1 style="color: green;">ok</h1>';
    })->name('form');

       Route::get('/form', function () {
        echo '<h1 style="color: green;">form</h1>';
    })->name('form');

   });
});


Route::prefix('admin')->group(function(){
    //category
    Route::prefix('category')->group(function(){

        Route::get('/{cate?}', function ($cate=null) {    
            echo "category $cate";
        });

        Route::get('/{cate}/post/{post?}', function ($cate=null,$post=null) {    
            echo "category $cate & post $post";
        });
    });
    //post
    Route::prefix('post')->group(function(){

        Route::get('/{post?}', function ($post=null) {    
            echo "post $post";
        });

        Route::get('/edit/{edit?}', function ($edit=null) {    
            echo "edit $edit";
        });
    });
});


Route::get('greeting', function () {
    //C1
//     return view('greeting',[
//         'name' => 'NET',
//         'age' => 2000,
// ]);
    //C2
    return view('greeting')->with([
       'name' => 'NET',
       'age' => 2000,
   ]);
});

Route::get('/admin/setting', function() {
    return view('admin.setting');
});

Route::get('/child', function() {
    $list=['HTML','CSS','JS','JAVA','PHP'];
    return view('admin.child')->with('list',$list);
});

Route::get('/add', function() {
    return view('admin.add');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('test')->group(function(){
Route::get('/test', 'TestController@index');
Route::get('/page/{page?}', 'TestController@page');
});

// Route::prefix('admin')->namespace('Admin')->group(function(){
// Route::get('index', 'AdminController@index');
// Route::get('setting', 'SettingController@index');
// });

Route::group([
'prefix'=>'admin',
'namespace'=>'Admin'
],function(){
Route::get('index', 'AdminController@index');
Route::get('setting', 'SettingController@index');
});

Route::resource('todos', 'TodoController');