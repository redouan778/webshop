<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Cart
{
    public function show()
    {
        //Retrieves all the data from the session.
        return session('cart');
    }

    //Add product to cart if it doesn't exist in the cart yet. If it does exist, add one to the amount.
    public function add($id, $amount)
    {
        $found = false;
        $items = session('cart');

        if (is_array($items)) {
            foreach ($items as $key => $item) {
                if ($item['id'] === $id) {
                    $items[$key]['quantity'] += $amount;
                    $found = true;
                }
            }
        }
        if ($found === false) {
            $item = array(
                "id" => $id,
                "quantity" => $amount
            );
            $items[] = $item;
        }
        session(['cart' => $items]);
    }

    //Remove product from the cart.
    public function remove($id, $amount)
    {
        $found = false;
        $items = session('cart');

        if (is_array($items)) {
            foreach ($items as $key => $item) {
                if ($item['id'] === $id) {
                    $items[$key]['quantity'] -= $amount;
                    if ($items[$key]['quantity'] <= 0) {
                        unset($items[$key]);
                        $items = array_values($items);
                    }
                    $found = true;
                }
            }
        }

        if ($found === false) {
            //melding geven van durp??
        }
        session(['cart' => $items]);
    }

    //Removes all the products from the cart.
    public function reset()
    {
        session()->forget('cart');
    }
}
