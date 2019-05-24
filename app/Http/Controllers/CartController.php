<?php
namespace App\Http\Controllers;
use App\Cart;
use Illuminate\Http\Request;
class CartController extends Controller
{
    public function index()
    {
        $cart = new Cart();
        $array = $cart->index();
        $totalPrice = $array[0];
        $productsInCart = $array[1];
        return view('shoppingCart', compact('productsInCart', 'totalPrice'));
    }

    public function addToCart($id)
    {
        $cart = new Cart();
        $cart->addToCart($id);

        return redirect('/shoppingCart');
    }

    public function updateCart(Request $request, $id)
    {
        $cart = new Cart();
        $cart->updateCart($request, $id);
        return redirect('cart');
    }

    public function removeFromCart($id)
    {
        $cart = new Cart();
        $cart->removeFromCart($id);
        return redirect('cart');
    }


    public function deleteAllProducts()
    {
        request()->session()->forget('cart');

        return redirect('/');
    }
}