<?php

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/admin', 'HomeController@admin')->middleware('auth');

Route::get('/contact', function () {
    return view('contact');
});

Route::prefix('admin')->group(function () {
	Route::get('categories', 'CategoryController@categories');
	Route::get('category/{id}', 'CategoryController@category');
});

Route::post('/admin/categories', 'CategoryController@postCategory');
Route::post('/admin/category/{id}/item', 'ItemController@postItem');
Route::get('/admin/categories/{id}/items', 'ItemController@items');
Route::post('/admin/category/{id}', 'CategoryController@editCategory');
Route::post('/admin/category/{id}/delete', 'CategoryController@deleteCategory');

Route::prefix('api/v1')->group(function() {
	Route::get('categories', 'ApiController@categories');
	Route::get('category/{id}', 'ApiController@getCategory');
});