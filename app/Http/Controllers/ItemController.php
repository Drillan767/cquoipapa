<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use App\Category;
use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller {

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
	private function uploadItem($file, $category_id) {
		$filename = $file->getClientOriginalName();
		$path = $file->storeAs("public/category/$category_id/items", $filename);
		return '/' . str_replace('public', 'storage', $path);
	}
}