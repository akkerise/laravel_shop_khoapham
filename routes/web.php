<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('test',function(){
	return view('admin.cate.cate_list');
});

Route::group(['prefix' => 'admin'],function(){
	Route::group(['prefix' => 'cate'],function(){
		Route::get('list','CateController@getList')->name('admin.cate.getList');
		Route::get('add','CateController@getAdd')->name('admin.cate.getAdd');
		Route::post('add','CateController@postAdd')->name('admin.cate.postAdd');
		Route::get('delete/{id}','CateController@getDelete')->name('admin.cate.getDelete');
		Route::get('edit/{id}','CateController@getEdit')->name('admin.cate.getEdit');
		Route::post('edit/{id}','CateController@postEdit')->name('admin.cate.postEdit');
	});
});

Route::get('/routes',function(){
	return view('routes');
});