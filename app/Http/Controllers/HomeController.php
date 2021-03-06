<?php
namespace App\Http\Controllers;

use App\Cate;
use App\Product;
use App\ProductImage;
use Cart;
// use Darryldecode\Cart\Facades\CartFacade as Cart;
use function Composer\Autoload\includeFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Mail;
use Validator;
use Illuminate\Support\Facades\Redis;
// use Request;

//use App\Libs\config;
//use App\Libs\nganluong;
//use App\Libs\nusoap;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 **9-
     * 
	 * @return void
	 */
	public function __construct() {
//		$this->middleware('guest');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		// $products = Product::all();
//        $c = Cache::get('cates');
//        $p = Cache::get('products');
//        $p_l = Cache::get('products_lastest');
//        if ($c != null){
//            return $c;
//        }
//        if ($p != null){
//            return $p;
//        }
//        if ($p_l != null){
//            return $p_l;
//        }
		$cates            = Cate::all();
		$products         = DB::table('products')->select()->orderBy('id', 'DESC')->skip(0)->take(4)->get();
		$products_lastest = DB::table('products')->select()->orderBy('id', 'ASC')->skip(0)->take(4)->get();
		return view('shop.pages.home',compact('products','cates','products_lastest'));
	}

	public function listProducts($id) {
		$list_products      = Product::select()->where('cate_id', $id)->paginate(3);
		$list_cate_products = Cate::select('parent_id')->where('id', $list_products[0]->cate_id)->first();
		$menu_cates         = Cate::select('id', 'name', 'alias')->where('parent_id', $list_cate_products->parent_id)->get();
		$lastest_product    = Product::select('id', 'name', 'price', 'image', 'cate_id')->orderBy('id', 'DESC')->take(3)->get();
		$newest_products = Product::select('id','name','price','image','cate_id')->orderBy('id','DESC')->take(3)->get();

		foreach ($newest_products as $v){
			$newest_name_product = Cate::select('name')->where('id', $v->cate_id)->get()->toJson();
			// $parse_newest = json_encode($newest_name_product);
			// $p_newst = json_decode($newest_name_product);
		}
		$p_newst = json_decode($newest_name_product);
		return view('shop.pages.cate', compact('list_products','newest_products','newest_name_product','parse_newest','p_newst'));
	}

	public function listProductsDetail($id) {
		$list_products      = Product::select()->where('cate_id', $id)->paginate(3);
		$list_cate_products = Cate::select('parent_id')->where('id', $list_products[0]->cate_id)->first();
		$menu_cates         = Cate::select('id', 'name', 'alias')->where('parent_id', $list_cate_products->parent_id)->get();
		$lastest_product    = Product::select('id', 'name', 'price', 'image', 'cate_id')->orderBy('id', 'DESC')->take(3)->get();
		// $product_paginate = Product::select()->where('cate_id', $id)->paginate(6);
		foreach ($lastest_product as $v) {
			$cate_name = Cate::select('name')->where('id', $v->cate_id)->first();
		}
		return view('shop.pages.cate', compact('list_products', 'list_cate', 'menu_cates', 'lastest_product', 'cate_name'));
	}

	public function productDetail($id) {
		$product_detail  = Product::select()->where('id', $id)->first();
		$product_related = Product::select()->where('cate_id', $product_detail->cate_id)->where('id', '<>', $id)->orderBy('id', 'DESC')->take(4)->get();
		$image_details   = ProductImage::select('image')->where('product_id', $product_detail->id)->get();
		// dd($image_details);
		return view('shop.pages.product_detail', compact('product_detail', 'product_related', 'image_details'));
	}

	public function getSentMail() {
		return view('shop.pages.contact');
	}

	public function postSentMail(Request $request) {
		$rule = [
			'nameContact'    => 'required',
			'messageContact' => 'required',
			'email'          => 'email|required'
		];

		$message = [
			'nameContact.required'    => "Mời bạn nhập vào tên của bạn",
			'messageContact.required' => 'Mời bạn nhập vào nội dung bạn muốn phản hồi',
			'email.email'             => 'Bạn nhập chưa đúng định dạng email',
			'email.required'          => 'Mời bạn nhập vào email của bạn'
		];
		// dd($request->email);
		$validation = Validator::make($request->all(), $rule, $message);

		if ($validation->fails()) {
			return redirect()->back()->withInput()->withErrors($validation);
		} else {
			$email = $request->input('email');
			// dd($email);
			$data = [
				'name' => $request->nameContact,
				'mess' => $request->messageContact
			];
			// Mail::send('nội dung của mail file html' ,'dữ liệu cần gửi đi','hành động')
			Mail::send('shop.mail.mail', $data, function ($msg) {
					$msg->to('akkerise@gmail.com', 'AkKeRise');
				});
			return redirect('/');
		}
	}

	public function addCart($id) {
		$product_add_cart = Product::select()->where('id', $id)->first();
		Cart::add([
				'id'      => $id,
				'name'    => $product_add_cart->name,
				'alias'   => $product_add_cart->alias,
				'qty'     => 1,
				'price'   => $product_add_cart->price,
				'options' => [
					'img'    => $product_add_cart->image
				]
			]);

//        $cart = Cart::content();
        return redirect()->route('totalCart');
//		 return view('shop.pages.shopping-cart');
	}

//	 public function addCart($id) {
//	 	// CartItem::setCartItem($id);
//	 	$product_add_cart = Product::select()->where('id', $id)->first();
//	 	CartItem::setAttr($product_add_cart->id, $product_add_cart->name, $product_add_cart->alias, 1, $product_add_cart->price, $product_add_cart->image);
//	 	return view('shop.pages.shopping-cart');
//	 	// need fixed
//	 }

	public function totalCart() {
	    $cart = Cart::content();
	    $cartTotal = Cart::total();
		return view('shop.pages.shopping-cart',compact('cart','cartTotal'));
	}

	public function deleteIdCart($id) {
		Cart::remove($id);
		return redirect()->route('totalCart');
	}

	public function updateCart() {
		if (Request::ajax()) {
			$id  = Request::get('id');
			$qty = Request::get('qty');
			Cart::update($id, $qty);
			echo "OK";
		}
	}

//	public function showMoreProducts() {
//		$showMoreProducts = Product::select()->take(4)->get();
//		return route('home');
//	}

	public function ajaxLoadMore() {
//        $page  = Request::get('page');
//        $page = $_GET['page'];
		$products4 = Product::simplePaginate(4);
		return json_encode($products4);
	}

	public function getMyAccout() {
		return view('shop.pages.my-accout');
	}
}
