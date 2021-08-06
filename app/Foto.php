<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $fillable =[
    	'ruta','product_id',];

    public function product(){
    	return $this->belongsTo('App\Product');
    }
}
