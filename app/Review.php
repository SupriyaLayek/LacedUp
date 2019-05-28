<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
   protected $table = 'reviews';
   protected $fillable=['title','description'];

   public function product()
      {
          return $this->belongsTo('App\Product');
      }
}
