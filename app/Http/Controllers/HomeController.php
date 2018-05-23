<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\View\Factory;
use Illuminate\View;
use App\Category;
use Illuminate\Support\Facades\DB;
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

		$category = new Category();
		$category->title = $request->category_title;
		$category->description = $request->category_description;
		$category->actif = isset($request->category_enabled) ? true : false;
		$category->illustration = $this->uploadFile($request->category_illustration, $category->id);
		$category->save();

		return response()->json(Category::all());
	}

	public function editCategory(Request $request) {

	}

	public function deleteCategory(Request $request) {

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

		$category = Category::find($id);
		$category->item()->create([
			'title' => $request->item_title,
			'description' => $request->item_description,
		]);

		$item = Item::find(Item::max('id'));

		foreach($request->item_illustration as $image) {
			$item->image()->create([
				'path' => $this->uploadItem($image, $category->id)
			]);
		}

		return response()->json($item);
	}

	private function uploadFile($file, $category_id) {
		$filename = $file->getClientOriginalName();
		$path = $file->storeAs("public/category/$category_id", $filename);
		return '/' . str_replace('public', 'storage', $path);
	}

	private function uploadItem($file, $category_id) {
		$filename = $file->getClientOriginalName();
		$path = $file->storeAs("public/category/$category_id/items", $filename);
		return '/' . str_replace('public', 'storage', $path);
	}
}
