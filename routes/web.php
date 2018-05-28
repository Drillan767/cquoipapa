<?php

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/admin', 'HomeController@admin')->middleware('auth');

Route::get('/contact', function () {
    return view('contact');
});

Route::prefix('admin')->group(function () {
	Route::get('categories', 'HomeController@categories');
	Route::get('category/{id}', 'HomeController@category');
});

Route::post('/admin/categories', 'HomeController@postCategory');
Route::post('/admin/category/{id}/item', 'HomeController@postItem');
Route::get('/admin/categories/{id}/items', 'HomeController@items');
Route::post('/admin/category/{id}', 'HomeController@editCategory');

Route::prefix('api/v1')->group(function() {
	Route::get('categories', 'ApiController@categories');
	Route::get('category/{id}', 'ApiController@getCategory');
});