<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\View;
use Illuminate\Contracts\View\Factory;
use App\Category;
use App\Item;
use App\User;
use Illuminate\Http\Request;

class CategoryController extends Controller {

	/**
	 * @return Factory|View\View
	 */
	public function categories() {
		$categories = Category::all();
//		$user = User::find(1);
//		$user->userCategories()->attach(1);
		return view('admin.categories', ['categories' => $categories]);
	}

	public function category($id) {
		$category = Category::find($id);
		$item = Category::find($id)->item;

		return view('admin.category', ['category' => $category, 'items' => $item]);
	}

	/**
	 * @param Request $request
	 * @return JsonResponse.
	 */
	public function postCategory(Request $request) {

		$category = new Category();
		$category->title = $request->category_title;
		$category->description = $request->category_description;
		$category->enabled = isset($request->category_enabled) ? true : false;
		$category->illustration = '';
		$category->save();

		$category->illustration = $this->uploadFile($request->category_illustration, $category->id);
    $category->save();

		return response()->json($category);

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

		if($request->enabled != $checkbox) {
			$data['enabled'] = $checkbox;
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

		Category::destroy($request->id);

		return response()->json('done');
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
}