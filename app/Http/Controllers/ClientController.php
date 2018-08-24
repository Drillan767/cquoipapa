<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller {

	/**
	 * @return Factory|View
	 */
	public function index() {

		$users = User::where('roles', '=', 'client')->get();
		$categories = Category::all()->pluck('title', 'id');

		return view('admin.users', ['users' => $users, 'categories' => $categories]);
	}

	/**
	 * @param Request $request
	 * @return JsonResponse
	 */
	public function getClient(Request $request) {
		$user = User::find($request->id);
		$user->categories = $user->userCategories()->get();
		return response()->json($user);
	}

	/**
	 * @param Request $request
	 * @return JsonResponse
	 */
	public function postClient(Request $request) {

		$user = new User();
		$fields = ['first_name', 'last_name', 'phone', 'email'];
		foreach($fields as $field) {
			$user->$field = $request->$field;
		}
		$user->password = bcrypt($request->password);
		$user->roles = 'client';
		$user->nb_api_call = 0;
		$user->token = str_random('10');

		$user->save();

		if (isset($request->categories)) {
			foreach ($request->categories as $category) {
				$user->userCategories()->attach($category);
			}
		}

		return response()->json($user);
	}

	/**
	 * @param Request $request
	 * @param $id
	 * @return JsonResponse
	 */
	public function updateClient(Request $request, $id) {

		$data = [];
		$user = User::find($id);
		$fields = ['first_name', 'last_name', 'phone', 'email'];

		foreach($fields as $field) {
			if($user->$field !== $request->$field) {
				$data[$field] = $request->$field;
			}
		}

		if($request->password) {
			$data['password'] = bcrypt($request->password);
		}

		$user->userCategories()->sync($request->categories);

		if (!empty($data)) {
			$user->update($data);
		}

		return response()->json($user);
	}

	public function deleteClient($id) {
		$user = User::find($id);
		$user->userCategories()->detach();
		$user->delete();

		return response()->json('done');

	}

	public function export($id) {

		$client_id = "client_$id";
		$export = [];
		$user = User::find($id);

		foreach ($user->userCategories()->get() as $category) {

			$category_name = "$category->title";
			$items = $category->item()->get();

			foreach ($items as $item) {
				$item_name = "$item->title";
				$export[$category_name][$item_name] = $item->image()->get(['path']);

				foreach ($item->image()->get(['path']) as $image) {

					$new_path = "public/$client_id/$category_name/$item_name/" . basename($image->path);
					$old_path = str_replace('storage', 'public', $image->path);

					if (!Storage::disk('local')->has($new_path)) {
						Storage::copy($old_path, $new_path);

					}
				}
			}
		}
		return response()->json('done');
	}

	public function editUser() {
		$current_user = Auth::user();
		return view('auth.edit', ['user' => $current_user]);
	}

	public function postUser(Request $request) {

		$data = [];
		$fields = ['first_name', 'last_name', 'phone', 'email'];
		$user = User::find(Auth::id());

		foreach ($fields as $field) {
			if ($request->$field !== $user->$field) {
				$data[$field] = $request->$field;
			}
		}

		if ($request->old_password !== NULL) {
			if ($request->password !== NULL && $request->password_confirmation !== NULL) {
				if ($request->passsword === $request->password_confirmation) {
					$data['password'] = Hash::make($request->password);
				} else {
					return redirect()->back()->withErrors(["Erreur, les mots de passe ne correspondent pas"]);
				}
			} elseif ($request->password === NULL || $request->password_confirmation === NULL) {
				$die[] = 'new password';
				return redirect()->back()->withErrors(["Erreur, le nouveau mot de passe ou la confirmation n'ont pas été remplis"]);
			}
		}

		if (!empty($data)) {
			$user->update($data);
		}

		return redirect()->back()->with('success', 'Enregistré');

	}
}
