<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
   /* Relation: Order detail belongs to product */ 
  public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
     /* Relation: Order detail belongs to order */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    } 
     /* Relation: Order detail belongs to user */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
}
