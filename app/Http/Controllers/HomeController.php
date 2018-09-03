<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\View\Factory;
use Illuminate\View;
use App\Category;
use App\User;
use Illuminate\Http\JsonResponse;
use App\Item;

class HomeController extends Controller {

	/**
	 * Show the application dashboard.
	 *
	 * @return Response
	 */
	public function index() {
		return view('front.index');
	}

	/**
	 * @return Factory|View\View
	 */
	public function admin() {
		$users = User::where('roles', '=', 'client')->get();
	  $categories = Category::count();
	  $items = Item::count();
	  return view('admin.index', compact('users', 'categories', 'items'));
	}

	public function category($id) {
		$category = Category::find($id);
		$item = Category::find($id)->item;
		return view('admin.category', ['category' => $category, 'items' => $item]);
	}
}