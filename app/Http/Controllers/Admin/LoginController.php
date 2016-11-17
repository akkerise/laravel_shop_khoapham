<?php

namespace App\Http\Controllers\Admin;
namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {

	use AuthenticatesUsers;

	public function getLogin() {
		return view('admin.login');
	}

	public function postLogin(AdminLoginRequest $request) {
		// $login = [
		// 	'username' => $request->username,
		// 	'password' => $request->password,
		// 	'level'    => 1
		// ];
		if (Auth::attempt(['username' => $username, 'password' => $password])) {
			return redirect()->route('admin.cate.getList');
		} else {
			return redirect()->back();
		}
	}
}
