<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Session;
use App\cart;



class ProductController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    // Product::paginate(10);
    $products = Product::all();
    $categories = Category::all();

    return view('products.index',['data' => $data, 'products' => $products, 'categories' => $categories]);
  }


  public function AddToShoppingCart(Request $request, product $product, $id)
  {

    $product = Product::find($id);
    $oldCart = Session::has('cart') ? Session::get('cart') : null;
    $cart = new Cart($oldCart);
    $cart->add($product, $product->id);

      $request->session()->put('cart', $cart);


      return redirect('/');


  }

  public function getCart()
  {
      if (!Session::has('cart')){
          return view('shoppingCart',['products' => null]);
      }
      $oldCart = Session::get('cart');
      $cart = New Cart($oldCart);
//      $cart->cc();


      return view('shoppingCart',['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
  }

  public function deleteAllProducts()
  {
      request()->session()->forget('cart');

      return redirect('/');
  }



}
