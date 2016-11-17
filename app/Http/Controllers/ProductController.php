<?php

namespace App\Http\Controllers;

use App\Cate;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\ProductImage;
use File;
use Illuminate\Http\Request as Request;
class ProductController extends Controller {
	public function getAdd() {
		$cate = Cate::select('name', 'id', 'parent_id')->get()->toArray();
		return view('admin.product.product_add', compact('cate'));
	}

	public function postAdd(ProductRequest $request) {

		$file_name            = $request->file('fImages')->getClientOriginalName();
		$cate                 = Cate::where('name', $request->txtCP)->first()->toArray();
		$product              = new Product;
		$product->name        = $request->txtName;
		$product->alias       = $request->txtName;
		$product->price       = $request->txtPrice;
		$product->intro       = $request->txtIntro;
		$product->content     = $request->txtContent;
		$product->image       = $file_name;
		$product->keywords    = $request->txtKeywords;
		$product->description = $request->txtDescription;
		$product->user_id     = 1;
		$product->cate_id     = $cate['id'];
		$desPath              = public_path('image');
		$request->file('fImages')->move($desPath, $file_name);
		$product->save();
		$product_img_id = $product->id;
		if ($request->hasFile('fProductDetail')) {
			// dd(1121);
			foreach (($request->file('fProductDetail')) as $file) {
				// $file_img = $file->getClientOriginalName();
				// dd(Input::file('fProductDetail'));
				$product_img = new ProductImage();
				if (isset($file)) {
					// dd($file);
					$product_img->image      = $file->getClientOriginalName();
					$product_img->product_id = $product_img_id;
					// $dessPath = public_path('image/image_detail');
					// dd($dessPath);
					$file->move('public/image/image_detail', $file->getClientOriginalName());
					$product_img->save();
				}
			}
		}

		return redirect()->route('admin.product.getList')->with([
			'flash_message' => 'Bạn đã thêm thành công 1 sản phẩm mới',
			'flash_level'   => 'success'
			]);
	}

	public function getList() {
		$product = Product::all();
		return view('admin.product.product_list', compact('product'));
	}

	// public function getDelete($id){
	// $product = Product::delete('id',$id)->count();
	// if ($product == 0) {
	//     // dd($product);
	//     $p = Product::find($id);
	//     dd($p);
	//     $p->delete();
	//     return redirect()->route('admin.product.getList')->with([
	//             'delete' => "You success deteted product id : ",
	//             'id' => $id
	//         ]);
	// }else{
	//     echo 'You stopped this method because you not permission delete !';
	// }
	// }

	public function getDelete($id) {
		$product_detail = Product::find($id)->product_image;
		// dd($product_detail);
		if (count($product_detail) > 0) {
			foreach ($product_detail as $value) {
				File::delete('public/image'.$value->image);
			}
			$product = Product::find($id);
			// dd($product_detail);
			File::delete('public/image'.$product->image);
			$product->delete($id);
			return redirect()->route('admin.product.getList')->with([
				'delete' => 'Bạn đã xóa thành công',
				'id'     => $id
				]);
		} else {
			$product = Product::find($id);
			$product->delete($id);
			File::delete('public/image'.$product->image);
			return redirect()->route('admin.product.getList')->with([
				'delete' => 'Bạn đã xóa thành công . Vì không có ảnh phụ nên sản phẩm sẽ được xóa !'
				]);
		}
	}

	public function getEdit($id) {
		$cates       = Cate::select('id', 'name', 'parent_id')->get();
		$products    = Product::find($id);
		$product_img = Product::find($id)->product_image;
		return view('admin.product.product_edit', compact('cates', 'products', 'product_img'));
	}

	public function postEdit($id,Request $request) {
//		$cate                = Cate::where('parent_id', $request->sltParent);
//		$request->sltParent  = $cate->name;
        // Lưu ý muốn sửa bất kỳ trường nào ở đây ta phải cho nó giá trị của Category
		$product              = Product::findOrFail($id);
        $product->name        = $request->txtName;
        $product->alias       = $request->txtName;
        $product->price       = $request->txtPrice;
        $product->intro       = $request->txtIntro;
        $product->content     = $request->txtContent;
        $product->keywords    = $request->txtKeywords;
        $product->description = $request->txtDes;
        $product->user_id  = 1;
        $product->cate_id = $request->sltParent;
        // dd($request->all());

        $img_current = 'public/image/' . $request->img_current;
//        dd($img_current);
            // logic ở đây có ván đề vì nó không xóa ảnh trong database
        if (!empty($request->hasFile('fImages'))){
            $filename = $request->file('fImages')->getClientOriginalName();
            $product->image = $filename;
            $desPath = public_path('image');
            $request->file('fImages')->move($desPath,$filename);
            if(file_exists($img_current)){
                File::delete($img_current);
//                file_delete($img_current);
            }
        }else{
            echo "KO CÓ FILE";
        }
        $product->save();
        return redirect()->route('admin.product.getList')->with([
            'delete' => 'Bạn đã sửa thành công !'
        ]);
//		$product = Product::find($id);
//		$product->name = Request::input('txtName');
//		$product->alias = Request::input('txtName');
//		$product->price = Request::input('txtPrice');
//		$product->intro = Request::input('txtIntro');
//		$product->content = Request::input('txtContent');
//		$product->keywords = Request::input('txtKeyword');
//		$product->description = Request::input('txtDes');
//		$product->user_id = 1;
//		$product->cate_id = Request::input('sltParent');
//        dd($request->all());
//        $product->save();
	}

	public function getDelImg($id,Request $request) {
		if (Request::ajax()) {
			$idHinh = (int)Request::get('idHinh');
			// $idHinh = $request->idHinh;
			// dd($idHinh);
			$image_detail  = ProductImage::find($idHinh);
			if (!empty($image_detail)) {
				$img = '/public/image/'.$image_detail->image;
				if (File::exists($img)) {
					File::delete($img);
				}
				$image_detail->delete();
				$image_detail->save();
			}
			return "OK";
		}
	}
}
