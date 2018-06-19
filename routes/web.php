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

Route::prefix('admin')->group(function () {
	Route::get('categories', 'CategoryController@categories')->name('categories');
	Route::get('category/{id}', 'CategoryController@category');
	Route::get('/clients', 'ClientController@index')->name('clients');

});

Route::post('/admin/categories', 'CategoryController@postCategory');
Route::post('/admin/category/{id}/item', 'ItemController@postItem');
Route::get('/admin/categories/{id}/items', 'ItemController@items');
Route::post('/admin/category/{id}', 'CategoryController@editCategory');
Route::post('/admin/category/{id}/delete', 'CategoryController@deleteCategory');

Route::prefix('api/v1')->group(function() {
	Route::post('categories', 'ApiController@categories');
	Route::get('category/{id}', 'ApiController@getCategory');
	Route::post('user/login', 'ApiController@login');
});


// Sends values to the layout.
View::composer('layouts.admin', function($view) {

	$path = parse_url(url()->current())['path'];

  $locations = [
    '/admin' => [
    	'title' => 'Tableau de bord', 'fa' => 'cog'
    ],
    '/admin/categories' => [
    	'title' => 'Catégories', 'fa' => 'list'
    ],
    '/admin/items' => [
	     'title' => 'Objets', 'fa' => 'cubes'
	  ],
    'clients' => [
    	'title' => 'Clients', 'fa' => 'user'
    ]
  ];

  if(in_array($path, $locations)) {
	  $url = $locations[$path];
  } elseif(preg_match('/\/admin\/category\/[0-9]+$/', $path)) {
	  $url = $locations['/admin/categories'];
  }

  $categories = Category::count();
  $users = User::count();
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