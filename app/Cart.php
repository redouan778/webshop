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
        $found = false;     // $found = default boolean to check if the cart is already in the cart.
        $items = session('cart');
        if (is_array($items)) {     // Check if it is an array, if that is the case the if-statement will be done.
            foreach ($items as $key => $item) {
                if ($item['id'] === $id) {
                    $items[$key]['quantity'] += $amount;
                    $found = true;     // Converted boolean false to true.
                }
            }
        }
        if ($found === false) {     // If the product isn't in the cart, it will be added to the cart
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
                    $items[$key]['quantity'] -= $amount;   // $key = $item
                    if ($items[$key]['quantity'] <= 0) {
                        unset($items[$key]);    // Unset means $items[$key] will be pull out from the array and delete.
                        $items = array_values($items);  // Array_values converted the key name to the z-index from the array, and in the right order.
                    }
                    $found = true;
                }
            }
        }
        if ($found === false) {
            //melding geven van durp??
        }
        session(['cart' => $items]);    //$items array will be put in the session 'cart'.
    }

    //Removes all the products from the cart.
    public function reset()
    {
        session()->forget('cart');
    }
}