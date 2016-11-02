<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;

use App\Cate;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Input;
class ProductController extends Controller
{
    public function getAdd(){
        $cate = Cate::select('name','id','parent_id')->get()->toArray();
    	return view('admin.product.product_add',compact('cate'));
    }

    public function postAdd(ProductRequest $request){
        $file_name = $request->file('fImages')->getClientOriginalName();
        $cate = Cate::where('name',$request->txtCP)->first()->toArray();
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
        $product->cate_id = $cate['id'];
        $desPath = public_path('image');
        $request->file('fImages')->move($desPath,$file_name);
        $product->save();
        $product_img_id = $product->id;
        if(Input::hasFile('fProductDetail')){
            foreach ((Input::file('fProductDetail')) as $file) {
                // $file_img = $file->getClientOriginalName();
                $product_img = new ProductImage();
                if (isset($file)) {
                    $product_img->image = $file->getClientOriginalName();
                    $product_img->product_id = $product_img_id;
                    $file->move('public/image/image_detail/',$file->getClientOriginalName());
                    $product_img->save();
                }
            }
        }

        // return view('admin.product.product_list')->with([
        //     'flash_message' => 'Bạn đã thêm thành công 1 sản phẩm mới',
        //     'flash_level' => 'success'
        // ]);
    }

    public function getList(){
        return view('admin.product.product_list');
    }
}
