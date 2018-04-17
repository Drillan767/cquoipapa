<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {

	public $timestamps = false;

	public function images() {
		return $this->hasMany('App\Images');
	}

	public function category() {
		return $this->belongsTo('App\Category');
	}
}
