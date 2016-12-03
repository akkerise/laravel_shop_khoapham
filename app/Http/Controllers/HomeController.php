<?php

namespace App\Http\Controllers;
use App\Cate;
use App\Product;

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
		$cates = Cate::all();
		return view('shop.pages.home')->with([
				'products' => $products,
				'cates'    => $cates
			]);
	}

	// public function listProducts() {

	// }
	public function listProductsDetail($id) {
		$list_products = Product::select()->where('cate_id', $id)->get();
		return view('shop.pages.cate', compact('list_products'));
	}
}
