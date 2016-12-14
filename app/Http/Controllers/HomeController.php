<?php

namespace App\Http\Controllers;
use App\Cate;
use App\Product;
use App\ProductImage;
use Mail;
use Illuminate\Http\Request;
use Validator;
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
		$list_products      = Product::select()->where('cate_id', $id)->paginate(2);
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

	public function getSentMail(){
		return view('shop.pages.contact');
	}

	public function postSentMail(Request $request)
	{
		$rule = [
			'nameContact' => 'required',
			'messageContact' => 'required'
		];

		$message = [
			'nameContact.required' => "Mời bạn nhập vào tên của bạn",
			'messageContact.required' => 'Mời bạn nhập vào nội dung bạn muốn phản hồi'
		];

		$validation = Validator::make($request->all(),$rule , $message);

		if ($validation->fails()) {
			return redirect()->back()->withInput()->withErrors($validation);
		}else{
			$data =[
				'hoten' => 'Nguyễn Anh Thanh',
				'tuoi' => '25'
			];
			Mail::send('shop.pages.mail_content',$data,function($mess){
				$mess->from('nguyenthanh.rise.88@gmail.com','AkKeRise');
				$mess->to('akkerise@gmail.com','AkKe')->subject("This is Nguyen Thanh");
			});
		}
	}
}
