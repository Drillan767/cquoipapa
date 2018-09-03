<?php

use Illuminate\Support\Facades\View;
use App\Category;
use App\User;
use App\Item;

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/admin', 'HomeController@admin')->middleware('auth')->name('admin');

Route::get('/contact', function () {
  return view('contact');
});

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function() {
  Route::get('categories', 'CategoryController@categories')->name('categories');
  Route::get('category/{id}', 'CategoryController@category');
  Route::get('/clients', 'ClientController@index')->name('clients');
  Route::get('/user/edit', 'ClientController@editUser');
  Route::post('/user/edit', 'ClientController@postUser')->name('update_user');
  Route::get('/objets', 'ItemController@itemsList');
});

Route::post('/admin/categories', 'CategoryController@postCategory');
Route::post('/admin/category/{id}/item', 'ItemController@postItem');
Route::get('/admin/categories/{id}/items', 'ItemController@items');
Route::post('/admin/category/{id}', 'CategoryController@editCategory');
Route::post('/admin/category/{id}/delete', 'CategoryController@deleteCategory');
Route::post('/admin/item/delete', 'ItemController@deleteItem');
Route::post('/admin/item/{id}', 'ItemController@editItem');

Route::post('/admin/clients', 'ClientController@postClient');
Route::post('/admin/client/{id}', 'ClientController@updateClient');
Route::post('/admin/client/{id}/delete', 'ClientController@deleteClient');
Route::post('/admin/client/{id}/export', 'ClientController@export');

Route::prefix('api/v1')->group(function () {
  Route::post('categories', 'ApiController@categories');
  Route::post('items', 'ApiController@items');
  Route::get('category/{id}', 'ApiController@getCategory');
  Route::post('user/login', 'ApiController@login');
  Route::post('get_description', 'ApiController@getDescription');
  Route::post('client', 'ClientController@getClient');
  Route::get('overall', 'ApiController@overall');
});

// Sends values to the layout.
View::composer('layouts.admin', function ($view) {

  $path = parse_url(url()->current())['path'];

  $locations = [
    '/admin' => [
      'title' => 'Tableau de bord', 'fa' => 'cog'
    ],
    '/admin/categories' => [
      'title' => 'Catégories', 'fa' => 'list'
    ],
    '/admin/objets' => [
      'title' => 'Objets', 'fa' => 'cubes'
    ],
    '/admin/clients' => [
      'title' => 'Clients', 'fa' => 'user'
    ],
	  '/admin/user/edit' => [
	  	'title' => 'Modifier l\'utilisateur', 'fa' => 'user'
	  ]
  ];


  if (array_key_exists($path, $locations)) {
    $url = $locations[$path];
  } elseif (preg_match('/\/admin\/category\/[0-9]+$/', $path)) {
    $url = $locations['/admin/categories'];
  }

  $categories = Category::count();
	$users = count(User::where('roles', '=', 'client')->get());
  $items = Item::count();
  $disk = 100 - (disk_free_space('/') / disk_total_space('/') * 100);

  $view->with([
    'categories' => $categories,
    'users' => $users,
    'items' => $items,
    'disk' => round($disk, 2),
    'url' => $url
  ]);

});