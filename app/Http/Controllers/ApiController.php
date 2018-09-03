<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Category;
use App\Item;
use App\User;
use App\Image;

class ApiController extends Controller {

	use AuthenticatesUsers;

	public function login(Request $request) {
		$credentials = $request->only('email', 'password');

		if (Auth::attempt($credentials)) {
			return response()->json(Auth::user());
		}
	}

	public function categories(Request $request) {
		$user = User::where('token', '=', $request->token)->firstOrFail();
		$categories = $user->userCategories()->get();
		$response = [];
		foreach($categories as $category) {
			if($category->enabled) {
				array_push($response, $category);
			}
		}
		return response()->json($response);
	}

	public function getCategory($id) {
		return response()->json(Category::find($id));
	}

	public function items(Request $request) {
		$response = Item::find($request->id);
		$response->category = Item::find($request->id)->categoryItems;
	  return response()->json($response);
  }

  public function getDescription(Request $request) {
		$user = User::find($request->client_id)->firstOrFail();
	  $inc = $user->nb_api_call += 1;
	  $user->update(['nb_api_call' => $inc]);
	  $item = Item::find($request->item_id);
	  return response()->json($item->description);
  }

  public function overall() {
		$users = count(User::where('roles', '=', 'client')->get());
		$categories = count(Category::all());
		$images = count(Image::all());
		$contributors = count(User::all());

		return response()->json(compact('users', 'categories', 'images', 'contributors'));
  }
}
