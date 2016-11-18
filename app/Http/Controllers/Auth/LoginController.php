<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Contracts\Auth\Guard;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller {
	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	 */

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = '/home';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(Guard $auth) {
		$this->auth = $auth;
		// $this->registrar = $registrar;
		$this->middleware('guest', ['except' => 'logout']);
	}

	public function getLogin() {
		return view('admin.login');
	}
	public function postLogin(AdminLoginRequest $request) {
		// dd($request->all());
		$login = [
			'username' => $request->username,
			'password' => $request->password,
			'level'    => 1
		];
		if ($this->auth->attempt($login)) {
			return redirect()->route('admin.cate.getList');
		} else {
			return redirect()->back();
		}
	}
}
