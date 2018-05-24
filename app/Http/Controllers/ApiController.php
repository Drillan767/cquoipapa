<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class ApiController extends Controller {

	public function categories() {
		$categories = Category::all();
		return response()->json($categories);
	}

	public function getCategory($id) {
		return response()->json(Category::find($id));
	}
}
