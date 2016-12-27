<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\User;
use Hash;

class RegisterController extends Controller {
	public function getRegister() {
		return view('shop.pages.register');
	}

	public function postRegister(RegisterRequest $request) {
		// dd($request->all());
		// $user           = new User;
		// $user->username = $request->username;
		// $user->password = Hash::make($request->password);
		$find = User::select()->where('username',$request->username)->first();
		// dd($find);
		if (count($find) > 0) {
			return redirect()->route('getRegister')->with([
					'flash_message' => 'Username has exist !',
					'flash_level'		=> 'danger'
				]);
		} else {
			$user           = new User;
			$user->username = $request->username;
			$user->password = Hash::make($request->password);
			$user->email    = $request->email;
			$user->level    = 2;
			$user->save();

			return redirect('/')->with([
					'flash_message' => 'You are success created new username',
					'flash_level'   => 'success'
				]);
		}

	}
}
