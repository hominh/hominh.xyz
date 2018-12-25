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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'HomeController@index');

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');

Route::get('demo-pusher','HomeController@getPusher');
// Truyển message lên server Pusher
 Route::get('fire-event','HomeController@fireEvent');


Route::get('category/{alias}.html','CategoryController@getPostByCategory');
Route::get('tag/{alias}.html','TagController@getPostByTag');
Route::get('post/{alias}.html','PostController@getPostByAlias');
Route::post('comment','CommentController@store');
Route::get('contact.html','ContactController@index');
Route::post('contact','ContactController@storeMessage');
Route::post('/search','PostController@search');

Route::group(['prefix'=>'admin'],function(){
    Route::group(['prefix'=>'category'],function(){
        Route::get('list',['as'=>'admin.category.list','uses'=>'Admin\CategoryController@index']);
        Route::get('create',['as'=>'admin.category.create','uses'=>'Admin\CategoryController@create']);
        Route::post('store',['as'=>'admin.category.store','uses'=>'Admin\CategoryController@store']);
        Route::get('delete/{id}',['as'=>'admin.category.delete','uses'=>'Admin\CategoryController@destroy']);
        Route::get('edit/{id}',['as'=>'admin.category.edit','uses'=>'Admin\CategoryController@edit']);
        Route::post('update/{id}',['as'=>'admin.category.update','uses'=>'Admin\CategoryController@update']);
    });

    Route::group(['prefix'=>'post'],function(){
        Route::get('list',['as'=>'admin.post.list','uses'=>'Admin\PostController@index','middleware'=>['permission:post-list|post-create|post-edit|post-delete']]);
        Route::get('create',['as'=>'admin.post.create','uses'=>'Admin\PostController@create']);
        Route::post('store',['as'=>'admin.post.store','uses'=>'Admin\PostController@store']);
        Route::get('delete/{id}',['as'=>'admin.post.delete','uses'=>'Admin\PostController@destroy']);
        Route::get('edit/{id}',['as'=>'admin.post.edit','uses'=>'Admin\PostController@edit']);
        Route::post('update/{id}',['as'=>'admin.post.update','uses'=>'Admin\PostController@update']);
    });

    Route::group(['prefix'=>'config'],function(){
        Route::get('list',['as'=>'admin.config.list','uses'=>'Admin\ConfigController@index']);
        Route::get('create',['as'=>'admin.config.create','uses'=>'Admin\ConfigController@create']);
        Route::post('store',['as'=>'admin.config.store','uses'=>'Admin\ConfigController@store']);
        Route::get('delete/{id}',['as'=>'admin.config.delete','uses'=>'Admin\ConfigController@destroy']);
        Route::get('edit/{id}',['as'=>'admin.config.edit','uses'=>'Admin\ConfigController@edit']);
        Route::post('update/{id}',['as'=>'admin.config.update','uses'=>'Admin\ConfigController@update']);
    });

    Route::group(['prefix'=>'posttype'],function(){
        Route::get('list',['as'=>'admin.posttype.list','uses'=>'Admin\PosttypeController@index']);
        Route::get('create',['as'=>'admin.posttype.create','uses'=>'Admin\PosttypeController@create']);
        Route::post('store',['as'=>'admin.posttype.store','uses'=>'Admin\PosttypeController@store']);
        Route::get('delete/{id}',['as'=>'admin.posttype.delete','uses'=>'Admin\ConfigController@destroy']);
        Route::get('edit/{id}',['as'=>'admin.posttype.edit','uses'=>'Admin\PosttypeController@edit']);
        Route::post('update/{id}',['as'=>'admin.posttype.update','uses'=>'Admin\ConfigController@update']);
    });


    Route::group(['prefix'=>'contact'],function(){
        Route::get('list',['as'=>'admin.contact.list','uses'=>'Admin\ContactController@index']);
        Route::get('delete/{id}',['as'=>'admin.contact.delete','uses'=>'Admin\ContactController@destroy']);
        Route::get('edit/{id}',['as'=>'admin.contact.edit','uses'=>'Admin\ContactController@edit']);
    });
});

Route::group(['prefix'=>'admin'],function(){
    Route::get('home',['as'=>'admin.home.index','uses'=>'Admin\HomeController@index']);
    Route::get('logout',['as'=>'admin.home.logout','uses'=>'Admin\HomeController@getLogout']);
});
