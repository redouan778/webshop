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

    public function index()
    {
        $cartItems = $this->cart->index();
        $totalPrice = $this->cart->getTotal();
        $totalCount = $this->cart->getTotalCount();


        return view('shoppingCart', compact('cartItems','totalPrice', 'totalCount'));
    }

    public function addToCart($id)
    {
        $this->cart->addToCart($id);

        return redirect('/shoppingCart');
    }

    public function updateCart(Request $request, $id)
    {
        $this->cart->updateCart($request, $id);
        return redirect('cart');
    }

    public function removeFromCart($id)
    {
        $this->cart->removeFromCart($id);
        return redirect('shoppingCart');
    }


    public function deleteAllProducts()
    {
        request()->session()->forget('cart');
        return redirect('/');
    }
}