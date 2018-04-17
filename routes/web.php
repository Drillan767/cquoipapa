<?php

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/admin', 'HomeController@admin')->name('home')->middleware('auth');
