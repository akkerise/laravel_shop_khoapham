<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAdd(){
    	return view('admin.product.product_add');
    }

    public function postAdd(ProductRequest $request){
//        dd($request->all());
    }

    public function getList(){
        return view('admin.product.product_list');
    }
}
