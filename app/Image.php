<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {

	public $timestamps = false;
	protected $fillable = ['path', 'item_id'];

	public function category() {
		return $this->belongsTo('App\Item');
	}
}
