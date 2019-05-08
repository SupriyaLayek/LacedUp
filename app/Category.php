<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
	 use SoftDeletes;
      protected $dates = ['deleted_at'];

	protected $table = 'category';
    protected $fillable = ['name', 'description'];

    //Relation: Category hasMany Products
      public function products()
      {
          return $this->hasMany('App\Product','category_id','id');
      }
}