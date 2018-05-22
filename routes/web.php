<?php

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/admin', 'HomeController@admin')->middleware('auth');

Route::prefix('admin')->group(function () {
	Route::get('categories', 'HomeController@categories');
	Route::get('category/{id}', 'HomeController@category');
});

Route::post('/admin/categories', 'HomeController@postCategory');
