<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

	protected $fillable = ['name', 'slug', 'description', 'quantity', 'extract', 'price', 'category_id'];

	public function category(){
		return $this->belongsTo('App\Category');
	}

	public function foto(){
    	return $this->hasOne('App\Foto');
    }

    public function order_items(){
		return $this->hasOne('App\OrderItem');
	}
}
