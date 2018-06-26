<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Category;
use App\Item;
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
		$user = User::find($request->id);
		return response()->json($user->userCategories()->get());
	}

	public function getCategory($id) {
		return response()->json(Category::find($id));
	}

	public function items(Request $request) {
	  return response()->json(Item::find($request->id));
  }

  public function callApi(Request $request) {
	  $user = User::where('token', '=', $request->token)->firstOrFail();
	  $inc = $user->nb_api_call += 1;
    $user->update(['nb_api_call' => $inc]);
    return response()->json('done');

  }
}
