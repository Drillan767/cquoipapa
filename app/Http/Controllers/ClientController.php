<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

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
    $user->first_name = $request->user_first_name;
    $user->last_name = $request->user_last_name;
    $user->phone = $request->user_phone;
    $user->email = $request->user_email;
    $user->password = bcrypt('password');
    $user->roles = 'client';
    $user->nb_api_call = 0;
    $user->token = str_random('10');

    $user->save();

    if(isset($request->user_categories)) {
      foreach($request->user_categories as $category) {
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

    if($user->first_name !== $request->user_first_name) {
      $data['first_name'] = $request->user_first_name;
    }

    if($user->last_name !== $request->user_last_name) {
      $data['last_name'] = $request->user_last_name;
    }

    if($user->email !== $request->user_email) {
      $data['email'] = $request->user_email;
    }

    if($user->phone !== $request->user_phone) {
      $data['phone'] = $request->user_phone;
    }

    $user->userCategories()->sync($request->user_categories);

    if(!empty($data)) {
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

  	foreach($user->userCategories()->get() as $category) {

		  $category_name = "$category->title";
		  $items = $category->item()->get();

		  foreach ($items as $item) {
		  	$item_name = "$item->title";
			  $export[$category_name][$item_name] = $item->image()->get(['path']);

			  foreach($item->image()->get(['path']) as $image) {

			  	$new_path = "public/$client_id/$category_name/$item_name/" . basename($image->path);
			  	$old_path = str_replace('storage', 'public', $image->path);

			  	if(!Storage::disk('local')->has($new_path)) {
					  Storage::copy($old_path, $new_path);

				  }
			  }
		  }
	  }

  	return response()->json('done');




  }

}
