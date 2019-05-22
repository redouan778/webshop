<?php

namespace App\Http\Controllers;

use App\Product;

use App\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->cart = new Cart();
    }

    public function index(Request $request)
    {

            $categories = Category::all();
            if (!Session::has('cart')) {
                return view('cart.index', ['categories' => $categories, 'products' => null]);
            }
            return view('cart.index', [
                'categories' => $categories,
                'products' => $this->cart->getItems(),
                'totalQty' => $this->cart->GetTotalItemCount(),
                'totalPrice' => $this->cart->GetTotalPrice()]);

    }
    public function addToCart()
    {
        $category = $request->get('category');
        $productId = $request->get('product');
        $product = Product::find($productId);
        $this->cart->add($product, $product->id);
        return redirect()->back();
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
        $cart->deleteOneProduct($id);
        return redirect('/');
    }

    public function deleteAllProducts()
    {
        request()->session()->forget('cart');

        return redirect('/');
    }
}
