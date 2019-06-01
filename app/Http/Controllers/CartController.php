<?php
namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public $cart;

    public function __construct()
    {
        $this->cart = new Cart();
    }

    //Show the cart view with some data.
    public function index()
    {
        $items = $this->cart->show();
        $leeg = 'Winkelkar is leeg';


        if (is_array($items)) {
            foreach ($items as $item) {
                $product = Product::find($item['id']);
                $product['quantity'] = $item['quantity'];
                $products[] = $product;
            }
        }else{
            $leeg;
        }
        return view('shoppingCart', compact('products', 'leeg'));
    }

    //Add a product to cart.
    public function addToCart($id, $amount=1)
    {
        $this->cart->add($id, $amount);
        return redirect('/shoppingCart');
    }

    //Delete an individual product in the cart.
    public function removeFromCart($id, $amount=1)
    {
        $this->cart->remove($id, $amount);
        return redirect('shoppingCart');
    }

    //Deletes all product from cart
    public function deleteAllProducts()
    {
        $this->cart->reset();
        return redirect('/');
    }
}