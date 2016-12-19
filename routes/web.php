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

Route::get('/',
	function () {
		return view('shop.pages.home');
	});
Route::get('test', function () {
		return view('admin.cate.cate_list');
	});

Route::group(['prefix' => 'admin'], function () {

		Route::group(['prefix' => 'cate', 'middleware' => 'auth'], function () {
				Route::get('list', 'CateController@getList')->name('admin.cate.getList');
				Route::get('add', 'CateController@getAdd')->name('admin.cate.getAdd');
				Route::post('add', 'CateController@postAdd')->name('admin.cate.postAdd');
				Route::get('delete/{id}', 'CateController@getDelete')->name('admin.cate.getDelete');
				Route::get('edit/{id}', 'CateController@getEdit')->name('admin.cate.getEdit');
				Route::post('edit/{id}', 'CateController@postEdit')->name('admin.cate.postEdit');
			});
		Route::group(['prefix' => 'product', 'middleware' => 'auth'], function () {
				Route::get('add', 'ProductController@getAdd')->name('admin.product.getAdd');
				Route::post('add', 'ProductController@postAdd')->name('admin.product.postAdd');
				Route::get('list', 'ProductController@getList')->name('admin.product.getList');
				Route::get('delete/{id}', 'ProductController@getDelete')->name('admin.product.getDelete');
				Route::get('edit/{id}', 'ProductController@getEdit')->name('admin.product.getEdit');
				Route::post('edit/{id}', 'ProductController@postEdit')->name('admin.product.postEdit');
				Route::get('delimg/{id}', 'ProductController@getDelImg')->name('admin.product.getDelImg');
			});
		Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
				Route::get('add', 'UserController@getAdd')->name('admin.user.getAdd');
				Route::post('add', 'UserController@postAdd')->name('admin.user.postAdd');
				Route::get('list', 'UserController@getList')->name('admin.user.getList');
				Route::get('delete/{id}', 'UserController@getDelete')->name('admin.user.getDelete');
				Route::get('edit/{id}', 'UserController@getEdit')->name('admin.user.getEdit');
				Route::post('edit/{id}', 'UserController@postEdit')->name('admin.user.postEdit');
			});

		Route::get('login', 'Auth\LoginController@getLogin')->name('admin.login.getLogin');
		Route::post('login', 'Auth\LoginController@postLogin')->name('admin.login.postLogin');
		// Route::get('logout', 'Auth\LoginController@getLogout');
		Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

		// Route::get('login', function () {})->middleware('auth');

	});
Route::post('/logout', 'Admin\LoginController@logout');
Route::get('/routes', function () {
		return view('routes');
	});
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/list-products/{id}/{list-name-products}', 'HomeController@listProducts')->name('listProducts');
Route::get('/list-products-detail/{id}', 'HomeController@listProductsDetail')->name('listProductsDetail');
Route::get('/product-detail/{id}/{name_product}', 'HomeController@productDetail')->name('productDetail');
Route::get('/contact', 'HomeController@getSentMail')->name('getSentMail');
Route::post('/contact', 'HomeController@postSentMail')->name('postSentMail');
Route::get('/add-cart/{id}/{name_product}', 'HomeController@addCart')->name('addCart');
Route::get('/cart', 'HomeController@totalCart')->name('totalCart');
Route::get('/delete_id_cart/{rowID}', 'HomeController@deleteIdCart')->name('deleteIdCart');
Route::get('/update_cart/{id}/{qty}', 'HomeController@updateCart')->name('updateCart');
Route::post('/', 'HomeController@showMoreProducts')->name('showMoreProducts');
// Route::get('/test','HomeController@productDetail');
