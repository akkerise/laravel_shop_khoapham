<?php

namespace App\Http\Controllers;
use App\Cate;

use App\Product;
use App\ProductImage;
use Cart;

// use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use Mail;
use Validator;
// use Request;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		// $products = Product::all();
		$cates            = Cate::all();
		$products         = DB::table('products')->select()->orderBy('id', 'DESC')->skip(0)->take(4)->get();
		$products_lastest = DB::table('products')->select()->orderBy('id', 'ASC')->skip(0)->take(4)->get();
		return view('shop.pages.home')->with([
				'products'         => $products,
				'cates'            => $cates,
				'products_lastest' => $products_lastest
			]);
	}

	// public function listProducts() {

	// }
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

		if ($validation   ->fails()) {
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
		// dd(Cart::content());
		return redirect()->route('totalCart');
		// $content = Cart::content();
		// echo "<pre>";
		// print_r($content);
		// echo "</pre>";
		// return view('shop.pages.shopping-cart')->with([
		// 	'product_add_cart' => $product_add_cart
		// ]);
	}

	public function totalCart() {
		// dd(Cart::total());
		return view('shop.pages.shopping-cart')->with([
				'cart'      => Cart::content(),
				'cartTotal' => Cart::total()
			]);

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

	public function showMoreProducts() {
		$showMoreProducts = Product::select()->take(4)->get();
		return route('home');
	}

	public function ajax() {
		$id_skip_product = Product::select('id')->orderBy('id', 'DESC')->take(4)->get();
		$id_need         = array();
		foreach ($id_skip_product as $key) {
			array_push($id_need, $key->id);
		}
		// $products = Product::select()->orderBy('id', 'DESC')->offset([$id_need[0], $id_need[1], $id_need[2], $id_need[3]])->limit(4)->get()->toArray();
		$products = Product::select()->orderBy('id', 'DESC')->limit(4)->get()->toArray();
		return $products;
	}

	public function getMyAccout() {
		return view('shop.pages.my-accout');
	}

	// public function getShoppingCart(){
	//
	// }
}
