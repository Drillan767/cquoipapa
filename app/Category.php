<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model {

	public $timestamps = false;
	protected $table = 'category';

	public function subCategory() {
		return $this->hasMany('App\Item');
	}
}
