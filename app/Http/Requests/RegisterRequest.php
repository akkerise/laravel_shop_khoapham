<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest {
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
			'username'     => 'required|between:6,32',
			'email'        => 'email|required|between:6,32',
			'password'     => 'required|between:6,32',
			'confirm_pass' => 'required|same:password'
		];
	}

	public function messages() {
		return [
			'username.required'     => 'Input text for Username field',
			'username.between'      => 'Username need :min to :max character',
			'email.email'           => 'Email not right format',
			'email.required'        => 'Input text for Email field',
			'email.between'         => 'Email need :min to :max character',
			'password.required'     => 'Input text for Password field',
			'password.between'      => 'Password need :min to :max character',
			'confirm_pass.required' => 'Input text for Confirm Password field',
			'confirm_pass.same'     => 'Confirm Pass not same Password field'
		];
	}
}
