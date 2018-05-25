<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\View\Factory;
use Illuminate\View;
use App\Category;
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
		return view('admin.index');
	}

	/**
	 * @param Request $request
	 * @return JsonResponse.
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

	public function editCategory(Request $request, $id) {

		$category = Category::find($id);
		$data = [];
		$checkbox = isset($request->category_enabled) ? true : false;

		if($category->title != $request->category_title) {
			$data['title'] = $request->category_title;
		}

		if($request->description !== $request->category_description) {
			$data['description'] = $request->category_description;
		}

		if($request->actif != $checkbox) {
			$data['actif'] = $checkbox;
		}

		if(isset($request->category_illustration)) {
			$data['illustration'] = $this->updateFile($request->category_illustration, $id);
		}

		if(!empty($data)) {
			$category->update($data);
		}

		return response()->json($category);
	}

	public function deleteCategory(Request $request) {

	}

	/**
	 * @return Factory|View\View
	 */
	public function categories() {
		$categories = Category::all();
		return view('admin.categories', ['categories' => $categories]);
	}

	public function category($id) {
		$category = Category::find($id);
		$item = Category::find($id)->item;
		return view('admin.category', ['category' => $category, 'items' => $item]);
	}

	/**
	 * @param $id
	 * @return JsonResponse
	 */
	public function items($id) {
		$items = Category::find($id)->items;
		return response()->json($items);
	}

	/**
	 * @param $request
	 * @param $id integer
	 * @return JsonResponse
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

	public function editItem(Request $request) {

	}

	/**
	 * @param $file
	 * @param $category_id
	 * @return string
	 */
	private function uploadFile($file, $category_id) {
		$filename = $file->getClientOriginalName();
		$path = $file->storeAs("public/category/$category_id", $filename);
		return '/' . str_replace('public', 'storage', $path);
	}

	private function updateFile($file, $category_id) {
		$category = Category::find($category_id);
		$filename = $file->getClientOriginalName();
		unlink(str_replace('storage', 'public', base_path() . $category->illustration));
		$path = $file->storeAs("public/category/$category_id", $filename);
		return '/' . str_replace('public', 'storage', $path);
	}

	/**
	 * @param $file
	 * @param $category_id
	 * @return string
	 */
	private function uploadItem($file, $category_id) {
		$filename = $file->getClientOriginalName();
		$path = $file->storeAs("public/category/$category_id/items", $filename);
		return '/' . str_replace('public', 'storage', $path);
	}
}
