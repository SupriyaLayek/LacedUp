<?php

namespace App;
use App\User;
use App\OrderDetail;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  /* Relation: Order belongs to user */
 public function user() 
    {
        return $this->belongsTo(User::class);
    }
    /* Relation: order has many order details */
    public function orderdetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
