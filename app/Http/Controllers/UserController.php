<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller {
	/**
	 * POST /api/join
	 * Create new user by given parameters
	 */
	public function join (Request $request) {
		return response()->json($request->input());
	}
}
