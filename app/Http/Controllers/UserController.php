<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use App\User;
use Hash;

class UserController extends Controller {
	public function getList() {
		$users = User::all();
		return view('admin.user.user_list', compact('users'));
	}
	public function getAdd() {
		return view('admin.user.user_add');
	}
	public function postAdd(UserRequest $request) {
		$user                 = new User();
		$user->username       = $request->txtUser;
		$user->password       = Hash::make($request->txtPass);
		$user->email          = $request->txtEmail;
		$user->level          = $request->rdoLevel;
		$user->remember_token = $request->_token;
		$user->save();
		// $flash_level   = 'success';
		// $flash_message = 'Bạn đã thêm mới một người dùng';
		// return redirect()->route('admin.user.getList', compact('flash_level', 'flash_message'));
		return redirect()->route('admin.user.getList')->with([
				'flash_level'   => 'success',
				'flash_message' => 'Bạn đã thêm mới một người dùng'
			]);
	}
	public function getDelete() {

	}
	public function getEdit() {

	}
	public function postEdit() {

	}}
