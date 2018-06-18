<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ClientController extends Controller {

  public function index() {

    $users = User::where('roles', '=', 'client');

    return view('admin.users', ['users' => $users]);
  }
}
