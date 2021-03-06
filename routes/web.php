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
use App\Product;

Route::get('/',

function () {
		return view('shop.pages.home');
	});
Route::get('test', function () {
		return view('admin.cate.cate_list');
	});
// Ajax LoadMore
Route::get('/ajax-loadmore', 'HomeController@ajaxLoadMore');

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

Route::get('/register', 'RegisterController@getRegister')->name('getRegister');
Route::post('/register', 'RegisterController@postRegister')->name('postRegister');

Route::get('/list-products/{id}', 'HomeController@listProducts')->name('listProducts');
Route::get('/list-products-detail/{id}', 'HomeController@listProductsDetail')->name('listProductsDetail');
Route::get('/product-detail/{id}', 'HomeController@productDetail')->name('productDetail');
Route::get('/contact', 'HomeController@getSentMail')->name('getSentMail');
Route::post('/contact', 'HomeController@postSentMail')->name('postSentMail');
Route::get('/add-cart/{id}', 'HomeController@addCart')->name('addCart');
Route::get('/cart', 'HomeController@totalCart')->name('totalCart');
Route::get('/delete_id_cart/{rowID}', 'HomeController@deleteIdCart')->name('deleteIdCart');
Route::get('/update_cart/{id}/{qty}', 'HomeController@updateCart')->name('updateCart');
Route::post('/', 'HomeController@showMoreProducts')->name('showMoreProducts');

// Route MyAccout
Route::get('/my-accout', 'HomeController@getMyAccout')->name('getMyAccout');

Route::get('/redirect', 'SocialAuthController@redirect')->name('redirectLoginFacebook');
Route::get('/callback', 'SocialAuthController@callback');

// Route Shopping Cart
// Route::get('/shopping-cart' , 'HomeController@getShoppingCart')->name('getShoppingCart');

// Route
// Route::get('/test','HomeController@productDetail');

Route::get('/thanhtoanthanhcong', 'HomeController@checkOutSuccess');

Route::get('/test_id', function () {
		$id_skip_product = Product::select('id')->orderBy('id', 'DESC')->take(4)->get();
		$id_need = array();
		foreach ($id_skip_product as $key) {
			array_push($id_need, $key->id);
		}
		dd($id_need[0]);
});

Route::get('/nganluong_e004797d8856a81e885f72589b791e35.html','HomeController@xacthucnganluong');

Route::post('/sentdatanl', 'HomeController@sentDataNganLuong')->name('sentDataNganLuong');


// Laravel Debugbar
Route::get('/_debugbar/assets/stylesheets', [
    'as' => 'debugbar-css',
    'uses' => '\Barryvdh\Debugbar\Controllers\AssetController@css'
]);
Route::get('/_debugbar/assets/javascript', [
    'as' => 'debugbar-js',
    'uses' => '\Barryvdh\Debugbar\Controllers\AssetController@js'
]);




Route::get('/que',function (){
    $queue = Queue::push('LogMessage',array([
        'message' => 'Time'.time()
    ]));
    print_r(' '.$queue.' '.time());
});
class LogMessage{
    public function fire($job,$data){
        File::append(app_path().'/queue.txt',$data['message'].PHP_EOL);
        $job->delete();
    }
}

Route::get('/nganluongv3','NganLuongController@getSentToNL');
Route::post('/nganluongv3','NganLuongController@postSentToNL')->name('sentnl');



// Laravel Log View
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');