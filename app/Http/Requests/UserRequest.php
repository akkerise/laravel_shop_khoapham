<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'txtUser'   => 'required|unique:users,username',
			'txtPass'   => 'required',
			'txtRePass' => 'required|same:txtPass',
			'txtEmail'  => 'required|email'
		];
	}

	public function messages() {
		return [
			'*.required'     => "Không được để trống :attribute",
			'txtUser.unique' => "Đã tồn tại :attribute ",
			'txtRePass.same' => "Password phải trùng nhau",
			'txtEmail.email' => "Phải là định dạng email"
		];
	}
}
