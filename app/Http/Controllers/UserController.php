<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller {
	/**
	 * POST /api/join
	 * Create new user by given parameters
	 */
	public function join (Request $request) {
		$validator = Validator::make($request->all(), [
			'username' => 'required|max:32',
			'email'    => 'required|email|unique:users,email',
			'password' => 'required|max:255',
		]);
		if ($validator->fails()) {
			return response()->json([
				'email' => $request->input('email'),
				'succeed' => false,
			]);
		}
		$newuser = new User();
		$newuser->username = $request->input('username');
		$newuser->email = $request->input('email');
		$newuser->password = $request->input('password');
		$newuser->save();
		return response()->json([
			'id' => $newuser->id,
			'email' => $newuser->email,
			'succeed' => true,
		]);
	}
}
