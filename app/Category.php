<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model {

	public $timestamps = false;
	protected $table = 'category';
	protected $fillable = ['title', 'description', 'illustration', 'enabled'];

	public function categoryItems() {
	    return $this->belongsToMany('App\Item', 'category_item', 'category_id');
    }

	public function userCategories(){
		return $this->belongsToMany('App\User', 'category_user', 'category_id');
	}
}
