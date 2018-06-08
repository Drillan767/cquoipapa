<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Category;
use App\User;

class ApiController extends Controller {

	use AuthenticatesUsers;

	public function login(Request $request) {
		$credentials = $request->only('email', 'password');

		if (Auth::attempt($credentials)) {
			return response()->json(Auth::user());
		}
	}

	public function categories(Request $request) {
		$categories = User::find($request->id)->category;
		return response()->json($categories);
	}

	public function getCategory($id) {
		return response()->json(Category::find($id));
	}
}
