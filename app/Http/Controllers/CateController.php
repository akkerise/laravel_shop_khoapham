<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CateRequest;

use App\Cate;

class CateController extends Controller
{
	public function getList(){
		// $list = Cate::all();
        $list = Cate::select('id','name','parent_id')->orderBy('id','DESC')->get();
		return view('admin.cate.cate_list',compact('list'));
	}

    public function getAdd()
    {
        $list = Cate::select('id','name','parent_id')->get();
    	return view('admin.cate.cate_add')->with([
    	    'list' => $list
        ]);
    }

    public function postAdd(CateRequest $request)
    {
    	// dd($request->all());
    	$cate = new Cate;
    	$cate->name = $request->txtCateName;
    	$cate->alias = $request->txtCateName;
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
