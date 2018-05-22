<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\View\Factory;
use Illuminate\View;
use App\Category;

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
	 * @return View|Factory
	 */
	public function admin() {
		return view('admin.index');
	}

	/**
	 * @param $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function postCategory(Request $request) {
		$input = $request->all();

		$category = new Category();
		$category->title = $request->category_title;
		$category->description = $request->category_description;
		$category->actif = isset($request->category_enabled) ? true : false;
		$category->illustration = $this->uploadFile($request->category_illustration, $category->title);
		$category->save();

		return response()->json('shit is done');
	}

	public function categories() {
		$categories = Category::all();
		return view('admin.categories', ['categories' => $categories]);
	}

	public function category($id) {
		$category = Category::find($id);
		return view('admin.category', ['category' => $category]);
	}

	private function uploadFile($file, $name) {
		$filename = $file->getClientOriginalName();
		$path = $file->storeAs('public/category/' . $name, $filename);
		return '/' . str_replace('public', 'storage', $path);
	}
}
