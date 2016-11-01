<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;

use App\Cate;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAdd(){
        $cate = Cate::select('name','id','parent_id')->get()->toArray();
    	return view('admin.product.product_add',compact('cate'));
    }

    public function postAdd(ProductRequest $request){
        // dd($request->all());
        $file_name = $request->file('fImages')->getClientOriginalName();
        $product = new Product;
        $product->name = $request->txtName;
        $product->alias = $request->txtName;
        $product->price = $request->txtPrice;
        $product->intro = $request->txtIntro;
        $product->content = $request->txtContent;
        $product->image = $file_name;
        $product->keywords = $request->txtKeyword;
        $product->description = $request->txtDescription;
        $product->user_id = 1;
        $product->cate_id = $request->txtCP;
        // move images to uploads
        $desPath = public_path().'resources/uploads';
        $request->file('fImages')->move($desPath,$file_name);
        $product->save();
        return view('admin.product.product_list')->with([
            'flash_message' => 'Bạn đã thêm thành công 1 sản phẩm mới',
            'flash_level' => 'success'
        ]);
    }

    public function getList(){
        return view('admin.product.product_list');
    }
}
