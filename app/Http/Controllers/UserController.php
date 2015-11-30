<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class UserController extends Controller {
	/**
	 * POST /api/join
	 * Create new user by given parameters
	 */
	public function join () {
		return response()->json(['name' => 'John Doe']);
	}
}
