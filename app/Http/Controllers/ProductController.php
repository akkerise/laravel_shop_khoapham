<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;

use App\Cate;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAdd(){
        $cate = Cate::select('name','id','parent_id')->get()->toArray();
    	return view('admin.product.product_add',compact('cate'));
    }

    public function postAdd(ProductRequest $request){
        dd($request->all());
    }

    public function getList(){
        return view('admin.product.product_list');
    }
}
