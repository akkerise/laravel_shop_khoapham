<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Http\Requests\AdminLoginRequest;
use App\User;
use Auth;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
		// $this->middleware(['auth', 'admin'])->except('login');
	}

	public function getLogin() {
		return view(secure_url('admin.login'));
	}

	public function postLogin(AdminLoginRequest $request) {
		// dd($request->all());
		// Error logic level == 2 not login need fix
		$login = [
			'username' => $request->username,
			'password' => $request->password
		];
		$user_level = User::where('username', $request->username)->first()->level;
		$user       = User::where('username', $request->username)->first();
		if ($user_level == 1 || $user_level == 2 && $user != NULL) {
			if (Auth::attempt($login)) {
				return redirect()->route('admin.user.getList');
			} else {
				return redirect()->back();
			}
		} else {
			return redirect()->abort(503);
		}
		// $login_plus1 = ['level' => 1];
		// $login_plus2 = ['level' => 2];
		// $total       = array_merge($login, $login_plus2);
		// echo "<pre>";
		// var_dump($total);
		// echo "</pre>";
		// exit;

		// if () {
		// 	Auth::attempt($total);
		// 	return redirect()->route('admin.user.getList');
		// 	// echo "Thanh Cong";
		// } elseif (Auth::attempt(array_push($login, "level", 2))) {
		// 	return redirect()->route('admin.user.getList');
		// 	# code...
		// } else {
		// 	return redirect()->back();
		// 	// echo "Xit";
		// }

	}

	public function logout(Request $request) {
		Auth::logout($request->user);
		return redirect('/admin/login');
	}
}
