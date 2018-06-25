<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;

class ClientController extends Controller {

  public function index() {

    $users = User::where('roles', '=', 'client')->get();
    $categories = Category::all()->pluck('title', 'id');

    return view('admin.users', ['users' => $users, 'categories' => $categories]);
  }

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

  public function updateClient(Request $request) {

  }

  public function deleteClient(Request $request) {

  }
}
