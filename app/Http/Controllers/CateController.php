<?php

namespace App\Http\Controllers;

use App\Http\Requests\CateRequest;

use Illuminate\Http\Request;

use App\Cate;

use App\Http\Requests;

use Validator;

class CateController extends Controller
{
	public function getList(){
		// $list = Cate::all();

        $list = Cate::select('id','name','parent_id','alias')->orderBy('id','DESC')->get();
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

    public function getDelete($id){
        $parent = Cate::where('parent_id',$id)->count();
        // dd($parent);
        if ($parent == 0) {
            $cate = Cate::find($id);
            $cate->delete();
            return redirect()->route('admin.cate.getList')->with([
                'delete' => 'Bạn đã xóa thành công dữ liệu của cate ',
                'id' => $id
            ]);
        }else{
            echo    "<script type='text/javascript'>
                        alert('Sorry ! You can not delete category name');
                        window.location = '";
                        echo route('admin.cate.list');
                        echo "';
                    </script>";
        }
    }
    public function getEdit($id){
        $ctnames  = Cate::select('alias')->get();
        $data   = Cate::findOrFail($id)->toArray();
        $list = Cate::select('id','name','parent_id')->get();
        return view('admin.cate.cate_edit',compact('list','data','id','ctnames'));
    }
    public function postEdit(Request $request,$id){
        $rule = [
            'txtCateName' => 'required',
            'txtOrder' => 'required',
            'txtKeywords' => 'required',
            'txtDescription' => 'required'
        ];

        $messages = [
            '*.required' => 'Bạn bắt buộc phải nhập vào nhé !'
        ];

        $validation = Validator::make($request->all(),$rule,$messages);
        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
        }else{
            $cate = Cate::findOrFail($id);
            $cate->name = $request->txtCateName;
            $cate->alias = $request->txtCateName;
            $cate->order = $request->txtOrder;
            $cate->parent_id = 1;
            $cate->keywords = $request->txtKeywords;
            $cate->description = $request->txtDescription;
            $cate->save();
            return redirect()->route('admin.cate.getList')->with([
                'flash_message' => 'Bạn Thay Đổi Thành Công CMNR Nhé !!!',
                'flash_level' => 'success'
            ]);
        }
    }
}
