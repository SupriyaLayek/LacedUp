<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{   
	use SoftDeletes;
      protected $dates = ['deleted_at'];
	protected $table = 'products';
    protected $fillable= ['product_name','product_colour','description','price','image', 'category_id'];

   public function reviews()
      {
          return $this->hasMany('App\Review');
      }
}
