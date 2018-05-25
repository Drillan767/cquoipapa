<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model {

	public $timestamps = false;
	protected $table = 'category';
	protected $fillable = ['title', 'description', 'illustration', 'actif'];

	public function item() {
		return $this->hasMany('App\Item');
	}
}
