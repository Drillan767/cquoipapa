<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\View\Factory;
use Illuminate\View;
use App\Category;
use App\User;
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
	  $users = User::all();
	  $categories = Category::count();
	  $items = Item::count();
		return view('admin.index', [
		  'items' => $items,
      'categories' => $categories,
      'users' => $users
    ]);
	}

	public function category($id) {
		$category = Category::find($id);
		$item = Category::find($id)->item;
		return view('admin.category', ['category' => $category, 'items' => $item]);
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

/*
 Finir affichage d'items, modification et suppression avec les animations qui vont avec
 Mettre en place de quoi faire l'autocompletion + ajouter les catégories au client + en proposer d'autres avec l'AC
 Gérer tout ça depuis le back office

 Créer des services pour attacher + détacher une catégorie d'un utilisateur et incrémenter les appels à l'api

 */