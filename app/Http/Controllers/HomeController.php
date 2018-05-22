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
	 */
	public function postCategory($request) {

	}

	public function categories() {
		$categories = Category::all();
		return view('admin.categories');
	}
}
