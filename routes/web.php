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
        Route::get('list',['as'=>'admin.post.list','uses'=>'Admin\PostController@index']);
        Route::get('create',['as'=>'admin.post.create','uses'=>'Admin\PostController@create']);
        Route::post('store',['as'=>'admin.post.store','uses'=>'Admin\PostController@store']);
        Route::get('delete/{id}',['as'=>'admin.post.delete','uses'=>'Admin\PostController@destroy']);
        Route::get('edit/{id}',['as'=>'admin.post.edit','uses'=>'Admin\PostController@edit']);
        Route::post('update/{id}',['as'=>'admin.post.update','uses'=>'Admin\PostController@update']);
    });



    Route::group(['prefix'=>'slide'],function(){
        Route::get('list',['as'=>'admin.slide.list','uses'=>'Admin\SlideController@index']);
        Route::get('create',['as'=>'admin.slide.create','uses'=>'Admin\SlideController@create']);
        Route::post('store',['as'=>'admin.slide.store','uses'=>'Admin\SlideController@store']);
        Route::get('delete/{id}',['as'=>'admin.slide.delete','uses'=>'Admin\SlideController@destroy']);
        Route::get('edit/{id}',['as'=>'admin.slide.edit','uses'=>'Admin\SlideController@edit']);
        Route::post('update/{id}',['as'=>'admin.slide.update','uses'=>'Admin\SlideController@update']);
        Route::get('delImg/{id}',['as'=>'admin.slide.delImg','uses'=>'Admin\SlideController@getDelImg']);
    });
});
