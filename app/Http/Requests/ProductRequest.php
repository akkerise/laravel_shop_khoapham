<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'txtCP' => 'required',
            'txtName' => 'required|unique:products,name',
            'txtPrice' => 'required',
            'txtIntro' => 'required',
            'txtContent' => 'required',
            'fImages' => 'required',
            'txtOrder' => 'required',
            'txtDescription' => 'required'
        ];
    }

    public function messages()
    {
        return [

            'txtCP.required' => 'Bạn bắt buộc phải nhập Parent ID ',
            'txtName.required' => 'Bạn bắt buộc phải nhập Product Name ',
            'txtPrice.required' => 'Bạn bắt buộc phải nhập Product Price ',
            'txtIntro.required' => 'Bạn bắt buộc phải nhập Product Intro ',
            'txtContent.required' => 'Bạn bắt buộc phải nhập Product Content ',
            'fImages.required' => 'Bạn bắt buộc phải nhập Product Images ',
            'txtOrder.required' => 'Bạn bắt buộc phải nhập Product Order ',
            'txtDescription.required' => 'Bạn bắt buộc phải nhập Product Description ',
            'txtName.unique' => 'Tên của sản phẩm đã tồn tại , mời bạn đặt tên khác cho sản phẩm'
        ];
    }
}
