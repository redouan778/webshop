<?php
namespace App\Http\Controllers;
use App\Cart;
use Illuminate\Http\Request;
class CartController extends Controller
{
    public $cart;
    public function __construct()
    {
        $this->cart = $cart = new Cart();
    }


    //Show the cart view with some data.
    public function index()
    {
        $cartItems = $this->cart->index();
        $totalPrice = $this->cart->getTotal();
        $totalCount = $this->cart->getTotalCount();

        return view('shoppingCart', compact('cartItems','totalPrice', 'totalCount'));
    }


    //Add a product to cart.
    public function addToCart($id)
    {
        $this->cart->addToCart($id);
        return redirect('/shoppingCart');
    }


    //Update the cart.
    public function updateCart(Request $request, $id)
    {
        $this->cart->updateCart($request, $id);
        return redirect('cart');
    }


    //Delete an individual product in the cart.
    public function removeFromCart($id)
    {
        $this->cart->removeFromCart($id);
        return redirect('shoppingCart');
    }


    //Deletes all product from cart
    public function deleteAllProducts()
    {
        $this->cart->deleteAll();
        return redirect('/');
    }
}