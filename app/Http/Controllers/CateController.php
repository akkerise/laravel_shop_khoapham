<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CateRequest;

use App\Cate;

class CateController extends Controller
{
	public function getList(){
		$list = Cate::all();
		return view('admin.cate.cate_list',compact('list'));
	}

    public function getAdd()
    {
    	return view('admin.cate.cate_add');
    }

    public function postAdd(CateRequest $request)
    {
    	// dd($request->all());
    	$cate = new Cate;
    	$cate->name = $request->txtCateName;
    	$cate->alias = $request->txtKeywords;
    	$cate->order = $request->txtOrder;
    	$cate->parent_id = 1;
    	$cate->keywords = $request->txtKeywords;
    	$cate->description = $request->txtDescription;
    	$cate->save();
    	return redirect()->route('admin.cate.getList')->with([
                'flash_message' => 'Bạn Tạo Thành Công CMNR Nhé !!!',
                'flash_level' => 'success'
            ]);
    }
}
