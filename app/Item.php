<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {

	public $timestamps = false;
	protected $fillable = ['title', 'description', 'category_id', 'illustration'];

	public function image() {
		return $this->hasMany('App\Image');
	}

    public function categoryItems(){
        return $this->belongsToMany('App\Category', 'category_item', 'item_id');
    }
}
