<?php

namespace App;

class Cart
{
  public $items = null;
  public $totalQty;
  public $totalPrice;

  public function __construct($oldCart)
  {
    if ($oldCart) {
      $this->items = $oldCart->items;
      $this->totalQty = $oldCart->totalQty;
      $this->totalPrice = $oldCart->totalPrice;
    }
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

    /**
     * @return null
     */
    public function getItems()
    {
    }

    }
