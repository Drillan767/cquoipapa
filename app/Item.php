<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {

	public $timestamps = false;
	protected $fillable = ['title', 'description', 'category_id'];

	public function image() {
		return $this->hasMany('App\Image');
	}

	public function category() {
		return $this->belongsTo('App\Category');
	}
}
