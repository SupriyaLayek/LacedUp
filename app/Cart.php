<?php
namespace App;
class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;
    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;  
        }
    }
    /*Add item to cart */
    public function add($item, $id) {
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items)  
        {
            if (array_key_exists($id, $this->items)) //checks if the item already exits
             {
                $storedItem = $this->items[$id]; 
            }
        }
        $storedItem['qty']++;  //increse the quantity of stored item
        $storedItem['price'] = $item->price * $storedItem['qty']; //update the totalPrice
        $this->items[$id] = $storedItem;  
        $this->totalQty++;    //increase quantity
        $this->totalPrice += $item->price;  //increase total Price
    }
        /*Reduce the quantity of the item by one in cart */
    public function reduceByOne($id) {
        $this->items[$id]['qty']--;  //reduce quantity by 1
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;          //reduce total quantity by one
        $this->totalPrice -= $this->items[$id]['item']['price']; //totalPrice = totalPrice - itemPrice
         if ($this->items[$id]['qty'] <= 0) //if quantity is less than 0
         {
            unset($this->items[$id]);       //remove the item from cart
        }
    }
        /* Remove the item completely from the cart*/ 
     public function removeItem($id) {
        $this->totalQty -= $this->items[$id]['qty']; //decrease total quantity
        $this->totalPrice -= $this->items[$id]['price']; //decrease total price
        unset($this->items[$id]); //remove the item
    }

    /* Increase the quantity by one */
 public function addone($id) {
        $this->items[$id]['qty']++; //increase the quantity of the product
        $this->items[$id]['price'] += $this->items[$id]['item']['price']; //increase total price
        $this->totalQty++;  //increase total quantity 
        $this->totalPrice += $this->items[$id]['item']['price']; //increase total price by adding the item price to it
    }
}

