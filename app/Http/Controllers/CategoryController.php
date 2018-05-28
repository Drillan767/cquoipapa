<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\View;
use Illuminate\Contracts\View\Factory;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {

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

		Category::destroy($request->id);

		return response()->json('done');
	}
}