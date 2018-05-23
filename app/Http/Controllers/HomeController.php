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
		$item = Category::find($id)->item;
		return view('admin.category', ['category' => $category, 'items' => $item]);
	}

	public function items($id) {
		$items = Category::find($id)->items;
		return response()->json($items);
	}

	/**
	 * @param $request
	 * @param $id integer
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function postItem(Request $request, $id) {
		$input = $request->all();

		$category = Category::find($id);
		$category->item->create([
			'title' => $request->title,
			'description' => $request->description,
			//@TODO: lier les images aux objets
		]);


		return response()->json($id);
	}

	private function uploadFile($file, $name) {
		$filename = $file->getClientOriginalName();
		$path = $file->storeAs('public/category/' . $name, $filename);
		return '/' . str_replace('public', 'storage', $path);
	}
}
