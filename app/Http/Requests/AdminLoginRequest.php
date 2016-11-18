<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest {
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
			'username' => 'required|between:6,18',
			'password' => 'required|between:6,18'
		];
	}
	public function messages() {
		return [
			'username.required' => 'Please enter username',
			'password.required' => 'Please enter password',
			'*.between'         => 'Please enter not range :min to :max'
		];
	}
}
