<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;


    public function __construct(){
        if (Session::has('cart')) {
            $this->items = Session::get('cart')->items;
            $this->totalPrice = Session::get('cart')->totalPrice;
            $this->totalQty = Session::get('cart')->totalQty;
        } else {
            $this->items = [];
            session()->put('cart', $this);
            //dd('no cart found, create new one');
        }
    }

    public function add($item, $id)
    {

            if (array_key_exists($id, $this->items)) {
                // ophalen, ophogen, opslaan
                $existingItem = $this->items[$id];
                $existingItem['quantity']++;
                $existingItem['subtotal'] = $existingItem['price'] * $existingItem['quantity'];
                $this->items[$id] = $existingItem;
            } else {
                // nieuw toevoegen met aantal 1
                $newitem = ['name' => $item->name, 'price' => $item->price];
                $newitem['quantity'] = 1;
                $newitem['subtotal'] = $newitem['price'] * $newitem['quantity'];
                $this->items[$id] = $newitem;
            }
            $this->SaveToSession();
        }

    private function SaveToSession() {
        $this->totalPrice = $this->GetTotalPrice();
        $this->totalQty = $this->GetTotalItemCount();
        session()->put('cart', $this);
    }

        public function deleteOneProduct($id)
        {
            $productsInCart = request()->session()->get('cart');

            foreach ($productsInCart->items as $key => $productInCart) {
                if ($key == $id) {
                    unset($productsInCart->items[$key]);
                    // request()->session()->pull('cart.'.$key, 'default');
                    request()->session()->put('cart', $productsInCart);
                }
            }
        }

    }

