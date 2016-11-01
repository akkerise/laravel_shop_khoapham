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
            'txtName' => 'required',
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
            '*.required' => 'Bạn bắt buộc phải nhập những trường này !'
        ];
    }
}
