<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller {
	/**
	 * POST /api/join
	 * Create new user by given parameters
	 */
	public function join (Request $request) {
		$validator = Validator::make($request->all(), [
			'name'     => 'required|max:32',
			'email'    => 'required|email',
			'password' => 'required|max:255',
		]);
		// $newuser = new User;
		return response()->json($validator->fails());
	}
}
