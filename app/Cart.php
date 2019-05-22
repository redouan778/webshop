<?php

namespace App;

class Cart
{
  public $items = null;
  public $totalQty;
  public $totalPrice;

  public function __construct()
  {
//    if ($oldCart) {
//      $this->items = $oldCart->items;
//      $this->totalQty = $oldCart->totalQty;
//      $this->totalPrice = $oldCart->totalPrice;
//    }
  }

    /**
     * @param $item
     * @param $id
     */
    public function Add($item, $id){
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
          if ($this->items) {
              if (array_key_exists($id, $this->items)) {
                  $storedItem = $this->items[$id];
              }
          }
          $storedItem['qty']++;
          $storedItem['price'] = $item->price * $storedItem['qty'];
          $this->items[$id] = $storedItem;
          $this->totalQty++;
          $this->totalPrice += $item->price;
      }


//    public function cc()
//    {
//    }
    /**
     * @param $id
     */
    // http://127.0.0.1:8000/deleteOneProduct/1
    public function deleteOneProduct($id)
    {
        $productsInCart = request()->session()->get('cart');

        foreach($productsInCart->items as $key => $productInCart)
        {
            if($key == $id)
            {
                unset($productsInCart->items[$key]);
               // request()->session()->pull('cart.'.$key, 'default');
                request()->session()->put('cart', $productsInCart);
            }
        }

    }

    }

