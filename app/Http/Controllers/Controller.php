<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Category;
use App\Item;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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
